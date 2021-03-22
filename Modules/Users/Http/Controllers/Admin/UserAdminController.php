<?php

namespace Modules\Users\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Users\Entities\User;
use Modules\Users\Http\Requests\UserCreateRequest;
use Modules\Users\Http\Requests\UserEditRequest;
use Modules\Users\Repository\UserAdminRepository;

class UserAdminController extends Controller
{

    private UserAdminRepository $rep;

    public function __construct(UserAdminRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::all();
        $users->load('balances');
        return view('users::admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        $user = $this->rep->store($request->all());
        return redirect()->route('admin.users.edit',$user->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(User $user)
    {
        dd(__FILE__,__METHOD__,'LINE: '.__LINE__,$user);
        return view('users::show');
    }

    public function hidden(User $user, Request $request)
    {
        $this->rep->update($user, $request->all());
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        return view('users::admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param UserEditRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserEditRequest $request, User $user)
    {
        $this->rep->update($user, $request->all());
        return redirect()->back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if($user->id == auth()->user()->id){
            return redirect()->back();
        }
        $user->delete();
        return redirect()->back();
    }
}
