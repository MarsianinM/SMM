<?php

namespace Modules\Rates\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rates\Entities\CategoryRate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $categories = CategoryRate::with('categoryDescription')->paginate(10);
        return view('rates::admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('rates::admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request): Renderable
    {
        //
    }

    /**
     * Show the specified resource.
     * @param CategoryRate $categoryRate
     * @return Renderable
     */
    public function show(CategoryRate $categoryRate): Renderable
    {
        return view('rates::admin.category.show', compact('categoryRate'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param CategoryRate $categoryRate
     * @return Renderable
     */
    public function edit(CategoryRate $categoryRate)
    {
        return view('rates::admin.category.edit', compact('categoryRate'));
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
