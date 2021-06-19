<?php

namespace Modules\ProjectGroup\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProjectGroup\Http\Requests\CreateProjectGroupRequest;
use Modules\ProjectGroup\Repository\ProjectGroupRepository;

class ProjectGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(ProjectGroupRepository $projectGroupRepository)
    {
        return view('projectgroup::front.client.index', [
            'projectGroup' => $projectGroupRepository->getProjectGroup()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        dd(__FILE__,__METHOD__,'LINE: '.__LINE__,);
        /*return view('projectgroup::create');*/
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CreateProjectGroupRequest $request, ProjectGroupRepository $projectGroupRepository)
    {
        $result = $projectGroupRepository->model()->create($request->except('_token'));
        if($result) return back()->with(['success' => trans('projectgroup::project_group.success_create', ['PROJECT' => $request->get('title') ])]);

        return back()->withErrors(trans('projectgroup::project_group.errors_create'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('projectgroup::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('projectgroup::edit');
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
