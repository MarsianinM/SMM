<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::where(function ($builder) {
            return $builder->where('sender_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })->where('parent_id', null)
            ->with('user')
            ->latest('id')
            ->get();

        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    public function create(): View
    {
        return view('messages.create');
    }

    public function store(MessageRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->get('email'))->first();

        $request['sender_id'] = Auth::id();
        $request['receiver_id'] = $user->id;

        Message::create($request->all());

        return redirect()->route('messages.index');
    }

    public function show(Message $message): View
    {
        $messages = Message::where('parent_id', $message->id)->oldest('id')->get();

        return view('messages.show', [
            'message' => $message->load('user'),
            'messages' => $messages
        ]);
    }

    public function message(Request $request, Message $message): RedirectResponse
    {
        $request['parent_id'] = $message->id;
        $request['sender_id'] = Auth::id();
        $request['receiver_id'] = $message->sender_id;
        Message::create($request->all());

        return redirect()->back();
    }
}
