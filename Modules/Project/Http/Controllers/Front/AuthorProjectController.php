<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Repository\ProjectAuthorRepository;
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
      //  dd(__FILE__,__LINE__,$projectAuthorRepository->getProject());
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
        $projectInWorkRepository->add($request);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}