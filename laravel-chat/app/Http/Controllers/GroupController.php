<?php

namespace App\Http\Controllers;

use App\Events\GroupCreated;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public $group;

    public function __construct(Group $group)
    {
        $this->middleware('auth');
        $this->group = $group;
    }
    public function index()
    {
        $groups = auth()->user()->groups;
        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('home1', ['groups' => $groups, 'users' => $users, 'user' => $user]);

    }
    public function store()
    {
        $group = Group::create(['name' => request('name')]);

        $users = collect(request('users'));
        $users->push(auth()->user()->id);

        $group->users()->attach($users);

        broadcast(new GroupCreated($group))->toOthers();

        return $group;
    }
}
