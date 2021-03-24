<?php

namespace Modules\Pages\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pages\Entities\Page;
use Modules\Pages\Http\Requests\CreatePageRequest;
use Modules\Pages\Http\Requests\EditPageRequest;
use Modules\Pages\Repository\PageAdminRepository;

class PageController extends Controller
{

    private PageAdminRepository $rep;

    public function __construct(PageAdminRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $pages = Page::orderBy('parent_id', 'asc')->with('child')->get();
        return view('pages::admin.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        $allPages  = Page::orderBy('parent_id', 'asc')->get();
        return view('pages::admin.create',compact('allPages'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePageRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePageRequest $request): RedirectResponse
    {
        $page = $this->rep->store($request->all());
        return redirect()->route('admin.page.edit',$page->id);
    }

    /**
     * Show the specified resource.
     * @param Page $page
     * @return Renderable
     */
    public function show(Page $page)
    {
        dd('LINE: '. __LINE__, 'FILE: ' .__FILE__, $page);
        return view('pages::admin.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Page $page
     * @return Renderable
     */
    public function edit(Page $page): Renderable
    {
        $allPages  = Page::orderBy('parent_id', 'asc')->get();
        return view('pages::admin.edit',compact('page','allPages'));
    }

    /**
     * Update the specified resource in storage.
     * @param EditPageRequest $request
     * @param Page $page
     * @return RedirectResponse
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(EditPageRequest $request, Page $page): RedirectResponse
    {
        $this->rep->update($page, $request->all());
        return redirect()->back();
    }

    public function hidden(Page $page, Request $request): RedirectResponse
    {
        $this->rep->update($page, $request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param Page $page
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();
        return redirect()->back();
    }
}
