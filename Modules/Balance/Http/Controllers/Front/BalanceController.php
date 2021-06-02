<?php

namespace Modules\Balance\Http\Controllers\Front;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Balance\Entities\Balance;
use Modules\Balance\Http\Requests\BalanceRequest;
use Modules\Balance\Repository\BalanceFrontRepository;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return array|false|Application|Factory|View|mixed
     */
    public function index()
    {
        return view('balance::front.index',[
            'balance_type' => Balance::getTypeBalance(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('balance::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param BalanceRequest $request
     * @param BalanceFrontRepository $balanceFrontRepository
     * @return RedirectResponse
     */
    public function store(BalanceRequest $request, BalanceFrontRepository $balanceFrontRepository): RedirectResponse
    {
        $balance = $balanceFrontRepository->save($request);
        if(!$balance) return back()->withErrors('Произошла ошибка нипишите в службу поддержки.');

        return back()->with('success','Ваш баланс пополнен.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('balance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('balance::edit');
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
