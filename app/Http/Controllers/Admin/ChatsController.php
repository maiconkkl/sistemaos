<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.chat.chat');
    }

    /**
     * Fetch all messages
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            "message" => $request->input("message")
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        return ["status" => "Message Sent!"];
    }
}
