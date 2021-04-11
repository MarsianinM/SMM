<?php

namespace Modules\News\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\CreateNewsRequest;
use Modules\News\Http\Requests\EditNewsRequest;
use Modules\News\Repository\NewsAdminRepository;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class NewsController extends Controller
{
    private NewsAdminRepository $rep;

    public function __construct(NewsAdminRepository $rep)
    {
        $this->rep = $rep;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $news = News::with('newsDescription')->paginate(10);
        return view('news::admin.index',[
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('news::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateNewsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateNewsRequest $request): RedirectResponse
    {
        $news = $this->rep->store($request->all());
        return redirect()->route('admin.news.edit',$news->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('news::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param News $news
     * @return Renderable
     */
    public function edit(News $news): Renderable
    {
        $news->load('newsDescription');
        return view('news::admin.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     * @param EditNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(EditNewsRequest $request, News $news): RedirectResponse
    {
        $this->rep->update($news, $request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param News $news
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(News $news): RedirectResponse
    {
        $id = $news->id;
        try {
            $news->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(trans('news::news.delete_error'));
        }
        return redirect()->back()->with(['success' => trans('news::news.delete', ['ID' => $id])]);
    }
}
