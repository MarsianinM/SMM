<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Http\Requests\ClientProjectRequest;
use Modules\Project\Repository\ProjectAuthorGroupRepository;
use Modules\Project\Repository\ProjectClientRepository;
use Modules\Project\Repository\ProjectCountBayRepository;
use Modules\Project\Repository\ProjectGroupRepository;
use Modules\Project\Repository\ProjectInWorkRepository;
use Modules\ProjectVip\Http\Requests\BayVipRequests;
use Modules\ProjectVip\Repository\ProjectVipRepository;
use Modules\ProjectVip\Repository\ProjectVipTariffRepository;
use Modules\Rates\Repository\CategoryRepository;
use Modules\Subjects\Repository\SubjectRepository;


class ClientProjectController extends Controller
{


    private ProjectClientRepository $rep;

    public function __construct(ProjectClientRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * @param Request $request
     * @param ProjectVipTariffRepository $vipTariffRepository
     * @return Renderable
     */
    public function index(
        Request $request,
        ProjectVipTariffRepository $vipTariffRepository
    ): Renderable
    {
        return view('project::front.client.index',[
            'projects'          => $this->rep->getProjects($request->all()),
            'activeProject'     => $this->rep->getActiveProject(),
            'activeVipProject'  => $this->rep->getActiveProject(true),
            'projectStatistic'  => $this->rep->getStatisticProject(),
            'request_sort'      => $request->get('sort') ?? 'default',
            'project_tariffs'    => $vipTariffRepository->getVipTariff(),
        ]);
    }

    /**
     * @param SubjectRepository $subjects
     * @param CategoryRepository $ratesRep
     * @param ProjectGroupRepository $projectGroup
     * @param ProjectAuthorGroupRepository $author_group
     * @return Renderable
     */
    public function create(
        SubjectRepository $subjects,
        CategoryRepository $ratesRep,
        ProjectGroupRepository $projectGroup,
        ProjectAuthorGroupRepository $author_group/*,
        Currency $currency*/
    ): Renderable
    {
        return view('project::front.client.create',[
            'subjects'          => $subjects->getList(),
            'rates'             => $ratesRep->getListRatesAll(),
            'project_group'     => $projectGroup->getProjectGroup(),
            'currency'          => $author_group->getAuthorGroup(),
            'user_group'        => $author_group->getAuthorGroup(),
            'delimiter'         => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param ClientProjectRequest $request
     * @return RedirectResponse
     */
    public function store(ClientProjectRequest $request): RedirectResponse
    {
        $page = $this->rep->store($request->all());
        return redirect()->route('client.projects.edit',$page->id);
    }

    /**
     * Show the specified resource.
     * @param Project $project
     * @return Renderable
     */
    public function show(Project $project): Renderable
    {
        dd(__FILE__,__METHOD__,'LINE: '.__LINE__,$project);
        //return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @param SubjectRepository $subjects
     * @param CategoryRepository $ratesRep
     * @param ProjectGroupRepository $projectGroup
     * @param ProjectAuthorGroupRepository $author_group
     * @return Renderable
     */
    public function edit(
        Project $project,
        SubjectRepository $subjects,
        CategoryRepository $ratesRep,
        ProjectGroupRepository $projectGroup,
        ProjectAuthorGroupRepository $author_group
    ): Renderable
    {
        return view('project::front.client.edit',[
            'subjects'          => $subjects->getList(),
            'rates'             => $ratesRep->getListRatesAll(),
            'project'           => $project->current(),
            'project_group'     => $projectGroup->getProjectGroup(),
            'user_group'        => $author_group->getAuthorGroup(),
            'delimiter'         => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param ClientProjectRequest $request
     * @param Project $project
     * @param ProjectClientRepository $projectClient
     * @return RedirectResponse
     */
    public function update(ClientProjectRequest $request, Project $project, ProjectClientRepository $projectClient)
    {
        $result = $projectClient->update($project, $request->all());
        if(!$result){
            return /*redirect()->*/back()->withErrors('Ошибка')->withInput();
        }
        return redirect()->route('client.projects.index')->with('success', 'Проект №'.$project->id.' обновлен');
    }

    /**
     * @param Project $project
     * @return RedirectResponse
     */
    public function activate(Project $project): RedirectResponse
    {
        $project->update(['status' => 'active']);
        return back();
    }

    /**
     * @param Project $project
     * @return RedirectResponse
     */
    public function off(Project $project): RedirectResponse
    {
        $project->update(['status' => 'off']);
        return back();
    }

    /**
     * @param Request $request
     * @param ProjectCountBayRepository $projectCountBayRepository
     * @return RedirectResponse
     */
    public function countBay(Request $request, ProjectCountBayRepository $projectCountBayRepository): RedirectResponse
    {
        $countBay = $projectCountBayRepository->save($request->except('_token'));
        if(!$countBay) return back()->withErrors('Ошибка напишите в службу поддержки');//ERROR

        if(!empty($countBay['error'])) return back()->withErrors($countBay['error']);

        return back()->with('success','Проект оплачен');
    }

    public function moneyBack(Request $request, ProjectCountBayRepository $projectCountBayRepository)
    {
        $result = $projectCountBayRepository->returnMany($request);
        if($result) return back()->with('success','Денежные средства возвращены');

        return back()->withErrors('Ошибка напишите в службу поддержки');//ERROR
    }

    public function projectInCheck($project, ProjectInWorkRepository $inWorkRepository)
    {
        $projects = $inWorkRepository->getInCheckProject($project);
        if(!count($projects)) return redirect()->route('client.projects.index')->with('success',trans('project::client.project_no_verified'));

        return view('project::front.client.in_check',[
            'projects' => $projects,
        ]);
    }

    public function projectClone(
        Project $project,
        SubjectRepository $subjects,
        CategoryRepository $ratesRep,
        ProjectGroupRepository $projectGroup,
        ProjectAuthorGroupRepository $author_group
    ): Renderable
    {
        return view('project::front.client.clone',[
            'subjects'          => $subjects->getList(),
            'rates'             => $ratesRep->getListRatesAll(),
            'project'           => $project->current(),
            'project_group'     => $projectGroup->getProjectGroup(),
            'user_group'        => $author_group->getAuthorGroup(),
            'delimiter'         => '',
        ]);
    }

    public function projectVerified($project_id, ProjectInWorkRepository $inWorkRepository)
    {
        $return = $inWorkRepository->verified($project_id);
        if(!$return)  return back()->withErrors('Ошибка!!! Напишите в службу поддержки');//ERROR
        return back()->with('success',trans('project::client.verified'));
    }

    public function projectRejected($project_id, ProjectInWorkRepository $inWorkRepository)
    {
        $return = $inWorkRepository->rejected($project_id);
        if(!$return)  return back()->withErrors('Ошибка!!! Напишите в службу поддержки');//ERROR
        return back()->with('success',trans('project::client.rejected'));
    }

    /**
     * Bay vip status
     * @param BayVipRequests $request
     * @param ProjectVipRepository $projectVipRepository
     * @return RedirectResponse
     */
    public function bayVip(BayVipRequests $request, ProjectVipRepository $projectVipRepository): RedirectResponse
    {
        $result = $projectVipRepository->saveVip($request->all());

        if(!empty($result['error'])) return back()->withErrors($result['error']);

        return back()->with(['success' => $result['success']]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Project $project
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project_title = $project->title;
        if(!$project->delete()) return back()->withErrors('Ошибка напишите в службу поддержки');//ERROR
        return back()->with('success','Проект << '.$project_title.' >> удален!!!');
    }
}
