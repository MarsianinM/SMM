<?php

namespace Modules\AuthorGroup\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
    public function index($id, UserAuthorGroupRepository $userAuthorGroupRepository)
    {
        return view('authorgroup::index',[
            'usersAuthors' => $userAuthorGroupRepository->getUser($id),
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
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('authorgroup::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
