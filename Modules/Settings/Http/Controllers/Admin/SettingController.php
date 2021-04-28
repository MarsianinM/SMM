<?php

namespace Modules\Settings\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Http\Requests\SettingRequest;
use Modules\Settings\Repository\SettingRepository;

class SettingController extends Controller
{
    protected SettingRepository $rep;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->rep = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('settings::admin.index', [
            'settings' => Setting::first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param SettingRequest $request
     * @return RedirectResponse
     */
    public function store(SettingRequest $request): RedirectResponse
    {
        try {
            $setting = $this->rep->store($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(trans('news::news.delete_error'));
        }
        \Cache::forget('websiteSetting');
        return redirect()->back()->with(['success' => trans('news::news.delete', ['ID' => $setting->id])]);
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

}
