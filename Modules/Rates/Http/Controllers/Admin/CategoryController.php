<?php

namespace Modules\Rates\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rates\Entities\CategoryRate;
use Modules\Rates\Http\Requests\CategoryCreateRequest;
use Modules\Rates\Http\Requests\CategoryEditRequest;
use Modules\Rates\Repository\CategoryRepository;

class CategoryController extends Controller
{

    private CategoryRepository $rep;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $rep
     */
    public function __construct(CategoryRepository $rep)
    {
        $this->rep = $rep;
    }
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
        $categories     = $this->rep->getCategoriesAll();
        $delimetr       = '';
        return view('rates::admin.category.create', compact('categories','delimetr'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryCreateRequest $request): RedirectResponse
    {
        $categoryRate = $this->rep->store($request->all());
        return redirect()->route('admin.category.edit',$categoryRate->id);
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
    public function edit($category): Renderable
    {
        $categoryRate   = CategoryRate::with('categoryDescription')->findOrFail($category);
        $categories     = $this->rep->getCategoriesAll($category);
        $delimetr       = '';
        return view('rates::admin.category.edit', compact('categoryRate','categories','delimetr'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryEditRequest $request
     * @param $category
     * @return RedirectResponse
     */
    public function update(CategoryEditRequest $request, $category): RedirectResponse
    {
        $this->rep->update(CategoryRate::with('categoryDescription')->findOrFail($category), $request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param $category
     * @return Renderable
     * @throws \Exception
     */
    public function destroy($category)
    {
        $categoryRate = CategoryRate::with('categoryDescription')->findOrFail($category);
        $id = $categoryRate->id;
        try {
            $categoryRate->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(trans('news::news.delete_error'));
        }
        return redirect()->back()->with(['success' => trans('news::news.delete', ['ID' => $id])]);
    }
}
