<?php

namespace Modules\AuthorGroup\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AuthorGroup\Entities\AuthorGroup;
use Modules\AuthorGroup\Http\Requests\CreateAuthorGroupRequest;
use Modules\AuthorGroup\Repository\AuthorGroupRepository;

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
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('authorgroup::edit');
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
     * @param AuthorGroup $authorGroup
     * @return RedirectResponse
     */
    public function destroy(AuthorGroup $authorGroup)
    {
        if($authorGroup->delete())
            return back()->with(['success' => trans('authorgroup::author_group.success_delete', ['ID' => $authorGroup->id])]);

        return back()->withErrors(trans('authorgroup::author_group.error_not_delete', ['ID' => $authorGroup->id]));
    }
}
