<?php

namespace Modules\AuthorGroup\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AuthorGroup\Entities\AuthorGroup;
use Modules\AuthorGroup\Http\Requests\CreateAuthorGroupRequest;
use Modules\AuthorGroup\Http\Requests\EditAuthorGroupRequest;
use Modules\AuthorGroup\Repository\AuthorGroupRepository;
use Modules\Project\Repository\ProjectClientRepository;

class AuthorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(AuthorGroupRepository $authorGroupRepository)
    {
        return view('authorgroup::front.client.index',[
            'authorGroups'      => $authorGroupRepository->getAuthorGroup(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateAuthorGroupRequest $request
     * @param AuthorGroupRepository $authorGroupRepository
     * @return RedirectResponse
     */
    public function store(CreateAuthorGroupRequest $request, AuthorGroupRepository $authorGroupRepository): RedirectResponse
    {
        $result = $authorGroupRepository->store($request->except('_token'));

        if(!empty($result['success']))
            return back()->with(['success' => $result['success']]);

        return back()->withErrors($result['error']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('authorgroup::show');
    }

    /**
     * Update the specified resource in storage.
     * @param EditAuthorGroupRequest $request
     * @param AuthorGroupRepository $authorGroupRepository
     * @return RedirectResponse
     */
    public function update(EditAuthorGroupRequest $request, AuthorGroupRepository $authorGroupRepository)
    {
        $result = $authorGroupRepository->update($request->except('_token'));

        if(!empty($result['success']))
            return back()->with(['success' => $result['success']]);

        return back()->withErrors($result['error']);
    }

    /**
     * Remove the specified resource from storage.
     * @param AuthorGroup $authorGroup
     * @return RedirectResponse
     */
    public function destroy(AuthorGroup $authorGroup, ProjectClientRepository $projectClientRepository)
    {
        if($authorGroup->delete()){
            $projectClientRepository->model()->where('author_group_id', $authorGroup->id)->where('client_id', auth()->id())->update(['author_group_id' => NULL]);
            return back()->with(['success' => trans('authorgroup::author_group.success_delete', ['ID' => $authorGroup->id])]);
        }
        return back()->withErrors(trans('authorgroup::author_group.error_not_delete', ['ID' => $authorGroup->id]));
    }
}
