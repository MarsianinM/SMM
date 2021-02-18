<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Models\Support;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index(): View
    {
        $supports = Support::where('parent_id', null)
            ->where(function ($builder) {
                return $builder->where('sender_id', 1)
                    ->orWhere('receiver_id', 1);
            })
            ->latest('id')->get();

        return view('admin.support.index', [
            'supports' => $supports
        ]);
    }

    public function create(): View
    {
        return view('admin.support.create');
    }

    public function store(SupportRequest $request): RedirectResponse
    {
        $request['sender_id'] = Auth::id();
        Support::create($request->all());

        return redirect()->route('admin.support.index');
    }

    public function show(Support $support): View
    {
        $messages = Support::where('parent_id', $support->id)->oldest('id')->get();

        return view('admin.support.show', [
            'support' => $support,
            'messages' => $messages
        ]);
    }

    public function destroy(Support $support): RedirectResponse
    {
        try {
            $support->delete();
        } catch (Exception $e) {
            logger($e->getMessage());
        }

        return redirect()->back();
    }
}
