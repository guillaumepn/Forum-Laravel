<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ThreadController extends Controller
{
    public function show($id) {
        return view('thread', ['thread' => Thread::findOrFail($id)]);
    }

    public function post(Request $request) {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Thread was successfully created !');

        return view('thread', ['id' => $request->id, 'thread' => $thread]);
    }
}
