<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Currency\Entities\Currency;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectGroup;
use Modules\Project\Http\Requests\ClientProjectRequest;
use Modules\Project\Repository\ProjectAuthorGroupRepository;
use Modules\Project\Repository\ProjectClientRepository;
use Modules\Project\Repository\ProjectGroupRepository;
use Modules\Rates\Repository\CategoryRepository;
use Modules\Subjects\Entities\Subject;
use Modules\Subjects\Repository\SubjectRepository;

class ClientProjectController extends Controller
{


    private ProjectClientRepository $rep;

    public function __construct(ProjectClientRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @param ProjectClientRepository $projectClientRepository
     * @param Request $request
     * @return Renderable
     */
    public function index(
        Request $request
    ): Renderable
    {
        return view('project::front.client.index',[
            'projects'          => $this->rep->getProjects($request->all()),
            'request_sort'      => $request->get('sort') ?? 'default'
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
        return view('project::show');
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
     * Remove the specified resource from storage.
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
