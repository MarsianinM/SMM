<?php

namespace Modules\News\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\CreateNewsRequest;
use Modules\News\Repository\NewsAdminRepository;

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
     * @return Renderable
     */
    public function store(CreateNewsRequest $request)
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
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('news::edit');
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
