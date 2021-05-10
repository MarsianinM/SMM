<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
     * @param ProjectGroup $projectGroup
     * @return Renderable
     */
    public function index(
        ProjectClientRepository $projectClientRepository,
        Request $request
    ): Renderable
    {
        return view('project::front.index',[
            'projects'          => $projectClientRepository->getProjects($request->all()),
            'request_sort'      => $request->get('sort') ?? 'default'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        dd(__FILE__,__LINE__,Subject::all());
        return view('project::front.create',[
            'subjects' => Subject::all(),
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
        $project_group = $projectGroup->getProjectGroup();
        $user_group = $author_group->getAuthorGroup();
        return view('project::front.edit',[
            'subjects'          => $subjects->getList(),
            'rates'             => $ratesRep->getListRatesAll(),
            'project'           => $project,
            'project_group'     => $project_group,
            'user_group'        => $user_group,
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
