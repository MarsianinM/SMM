<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetRole extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|in:client,author',
        ]);

        $request->user()->setActiveRole($validated['role']);

        return redirect()->route('home');
    }
}
