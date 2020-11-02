<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $group = auth()->user()->groups[0];
        $conversationDb = Conversation::select('message', 'users.name')
            ->join('users', 'conversations.user_id', '=', 'users.id')
            ->where('group_id', '=', 1)->get();
        return view('home2', ['group' => $group, 'conversationDb' => $conversationDb]);
    }
    public function store()
    {
        $conversation = Conversation::create([
            'message' => request('message'),
            'group_id' => request('group_id'),
            'user_id' => auth()->user()->id,
        ]);

        broadcast(new NewMessage($conversation))->toOthers();

        return $conversation->load('user');
    }
}
