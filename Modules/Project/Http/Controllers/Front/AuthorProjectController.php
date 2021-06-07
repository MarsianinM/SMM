<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Repository\ProjectAuthorRepository;
use Modules\Project\Repository\ProjectClientRepository;
use Modules\Project\Repository\ProjectInWorkRepository;

class AuthorProjectController extends Controller
{


    private ProjectAuthorRepository $rep;

    public function __construct(ProjectAuthorRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(
        Request $request
    ): Renderable
    {
        return view('project::front.author.index',[
            'projects'          => $this->rep->getProjects(),
            'request_sort'      => $request->get('sort') ?? 'default'
        ]);
    }


    /**
     * Show the specified resource.
     * @param $project_id
     * @return Renderable
     */
    public function show($project_id): Renderable
    {
        return view('project::front.author.show',[
            'project' => $this->rep->getProject($project_id),
        ]);
    }

    /**
     * @param Request $request
     * @param ProjectInWorkRepository $projectInWorkRepository
     * @return RedirectResponse
     */
    public function projectInWork(
        Request $request,
        ProjectInWorkRepository $projectInWorkRepository
    ): RedirectResponse
    {
        $project_in_work = $projectInWorkRepository->add($request);
        if(!empty($project_in_work['error'])) return redirect()->route('client.projects.index')->withErrors($project_in_work['error']);
        return redirect()->back();
    }

    public function refused($project_id, ProjectInWorkRepository $inWorkRepository, ProjectClientRepository $projectClientRepository)
    {
        $project = $projectClientRepository->model()->where('id',$project_id)->first();
        $inWorkRepository->refused($project);

        return redirect()->back()->with(['success' => trans('project::author.project_refused')]);
    }

    public function projectInCheck(Request $request, ProjectInWorkRepository $inWorkRepository)
    {
        $in_check = $inWorkRepository->setInCheckProject($request->except('_token'));

        if(!empty($in_check['error'])) return redirect()->back()->withErrors($in_check['error']);

        return redirect()->route('author.projects.index')->with(['success' => 'Проект отправлен на проверку'/*trans('project::author.project_refused')*/]);
    }
}
