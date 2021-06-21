<?php

namespace Modules\UserBlackList\Http\Controllers\Front;

use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\UserBlackList\Entities\UserBlackList;
use Modules\UserBlackList\Http\Requests\CreateBlackListRequest;
use Modules\UserBlackList\Http\Requests\MultipleDestroyRequest;
use Modules\UserBlackList\Repository\UserBlackListRepository;

class UserBlackListController extends Controller
{

    private UserBlackListRepository $rep;

    public function __construct(UserBlackListRepository $rep)
    {
        $this->rep = $rep;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('userblacklist::front.client.index',[
            'types'         => $this->rep->model()->getType(),
            'blacklist'     => $this->rep->getBlackList(),
        ]);
    }


    /**
     * @param CreateBlackListRequest $request
     * @return RedirectResponse
     */
    public function store(CreateBlackListRequest $request): RedirectResponse
    {
        $result = $this->rep->store($request->except('_token'));

        if(!empty($result['success']))
            return back()->with(['success' => $result['success']]);

        return back()->withErrors($result['error']);
    }

    public function destroy(UserBlackList $blackList)
    {
        if($blackList->delete())
            return back()->with(['success' => trans('userblacklist::blacklist.success_delete_user', ['ID' => $blackList->id])]);

        return back()->withErrors(trans('userblacklist::blacklist.error_not_delete_user', ['ID' => $blackList->id]));
    }

    public function multipleDestroy(MultipleDestroyRequest $request)
    {
        $this->rep->multipleDestroy($request->get('ids'));
        return back()->with(['success' => trans('userblacklist::blacklist.success_multiple_destroy')]);
    }
}
