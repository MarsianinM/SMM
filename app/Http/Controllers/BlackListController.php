<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlackListController extends Controller
{
    public function index(): View
    {
        return view('blacklists.index');
    }

    public function create(): View
    {
        return view('blacklists.create');
    }

    public function store(): RedirectResponse
    {
        return redirect()->back();
    }

    public function destroy(): RedirectResponse
    {
        return redirect()->back();
    }
}
