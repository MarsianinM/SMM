<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::where(function($builder) {
            return $builder->where('sender_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })->where('parent_id', null)
            ->with('user')
            ->latest('id')
            ->get();

        return view('admin.messages.index', [
            'messages' => $messages
        ]);
    }

    public function create(): View
    {
        return view('admin.messages.create');
    }
}
