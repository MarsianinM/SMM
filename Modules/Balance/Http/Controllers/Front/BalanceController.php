<?php

namespace Modules\Balance\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Balance\Entities\Balance;
use Modules\Balance\Http\Requests\BalanceRequest;
use Modules\Balance\Repository\BalanceFrontRepository;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
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
     * @return Renderable
     */
    public function store(BalanceRequest $request, BalanceFrontRepository $balanceFrontRepository)
    {
        $balance = $balanceFrontRepository->save($request);
        if(!$balance) return redirect()->back()->withErrors('Произошла ошибка нипишите в службу поддержки.');

        return redirect()->back()->with('success','Ваш баланс пополнен.');
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
