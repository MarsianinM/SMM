<?php

namespace App\Http\Controllers\Consumers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $role = Role::whereName('user')->first();

        $users = $role->users;

        return view('consumers.users.index', [
            'users' => $users
        ]);
    }
}
