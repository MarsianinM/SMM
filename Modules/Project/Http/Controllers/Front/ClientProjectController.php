<?php

namespace Modules\Project\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Http\Requests\ClientProjectRequest;
use Modules\Project\Repository\ProjectClientRepository;

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
    public function index(ProjectClientRepository $projectClientRepository, Request $request): Renderable
    {
        $projects = $projectClientRepository->getProjects($request->all());
        return view('project::front.index',[
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('project::front.create');
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
        dd('LINE: '. __LINE__, 'FILE: ' .__FILE__, $project);
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @return Renderable
     */
    public function edit(Project $project): Renderable
    {
        return view('project::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param ClientProjectRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(ClientProjectRequest $request, $id): Renderable
    {
        //
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
