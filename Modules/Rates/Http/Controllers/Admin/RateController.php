<?php

namespace Modules\Rates\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rates\Entities\CategoryRate;
use Modules\Rates\Entities\Rate;
use Modules\Rates\Http\Requests\CreateRateRequest;
use Modules\Rates\Http\Requests\EditRateRequest;
use Modules\Rates\Repository\CategoryRepository;
use Modules\Rates\Repository\RateRepository;

class RateController extends Controller
{
    private RateRepository $rep;

    /**
     * CategoryController constructor.
     * @param RateRepository $rep
     */
    public function __construct(RateRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $rates = Rate::with(['rateDescription','categoryRate'])->paginate(10);
        return view('rates::admin.rate.index',compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories     = (new CategoryRepository())->getCategoriesAll();
        $delimetr       = '';
        return view('rates::admin.rate.create', compact('categories','delimetr'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRateRequest $request): RedirectResponse
    {
        $rate = $this->rep->store($request->all());
        return redirect()->route('admin.rates.edit',$rate->id);
    }

    /**
     * Show the specified resource.
     * @param Rate $rate
     * @return Renderable
     */
    public function show(Rate $rate)
    {
        return view('rates::admin.rate.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Rate $rate
     * @return Renderable
     */
    public function edit(Rate $rate, CategoryRepository $categoryRepository)
    {
        $categories     = $categoryRepository->getCategoriesAll();
        $delimetr       = '';
        return view('rates::admin.rate.edit', compact('rate','categories','delimetr'));
    }

    /**
     * Update the specified resource in storage.
     * @param EditRateRequest $request
     * @param Rate $rate
     * @return RedirectResponse
     */
    public function update(EditRateRequest $request, Rate $rate)
    {
        $this->rep->update($rate, $request->all());
        return redirect()->back();
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
