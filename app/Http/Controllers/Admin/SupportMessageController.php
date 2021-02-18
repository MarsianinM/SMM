<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function message(Request $request, $id): RedirectResponse
    {
        $request['parent_id'] = $id;
        $request['sender_id'] = null;

        Support::create($request->all());

        return redirect()->back();
    }
}
