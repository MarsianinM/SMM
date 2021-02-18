<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('projects.index');
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function show($id): View
    {
        return view('projects.show');
    }

    public function edit($id): View
    {
        return view('projects.edit');
    }
}
