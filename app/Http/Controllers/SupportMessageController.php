<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function message(Request $request, $id): RedirectResponse
    {
        $request['parent_id'] = $id;
        $request['sender_id'] = Auth::id();
        Support::create($request->all());

        return redirect()->back();
    }
}
