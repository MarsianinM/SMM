<?php

namespace Modules\AuthorGroup\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AuthorGroup\Http\Requests\AddUserInGroupRequest;
use Modules\AuthorGroup\Repository\AuthorGroupRepository;
use Modules\AuthorGroup\Repository\UserAuthorGroupRepository;
use Modules\Users\Entities\User;
use Modules\Users\Repository\UserRepository;
use Response;

class UserAuthorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id, UserAuthorGroupRepository $userAuthorGroupRepository, AuthorGroupRepository $authorGroupRepository)
    {
        return view('authorgroup::front.client.user_index',[
            'group'         => $authorGroupRepository->model()->where('id',$id)->first(),
            'usersAuthors'  => $userAuthorGroupRepository->getUser($id),
        ]);
    }

    /**
     * @param Request $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function getUserSearch(Request $request, UserRepository $userRepository): JsonResponse
    {
        if(!$request->has('search'))
            return Response::json([]);

        return Response::json($userRepository->model()->where('name','LIKE','%'.$request->get('search').'%')->limit(10)->get());
    }


    /**
     * Store a newly created resource in storage.
     * @param AddUserInGroupRequest $request
     * @param UserAuthorGroupRepository $userAuthorGroupRepository
     * @return RedirectResponse
     */
    public function store(AddUserInGroupRequest $request, UserAuthorGroupRepository $userAuthorGroupRepository)
    {
        $result = $userAuthorGroupRepository->store($request->except('_token'));

        if(!empty($result['success']))
            return back()->with(['success' => $result['success']]);

        return back()->withErrors($result['error']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = app(UserAuthorGroupRepository::class)->model()->where('id',$id)->first();
       dd(__FILE__,__LINE__,$id);
    }
}
