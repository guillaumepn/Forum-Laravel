<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Pour mettre à jour updated_at du thread quand un new com est posté dessus,
         * utiliser $touches sur le Model "fils" (ici Comment)
         */
        $threads = Thread::orderBy('updated_at', 'desc')->paginate(15);
        $commentsPerThread = array();
        foreach ($threads as $thread) {
            $commentsPerThread[$thread->id] = Comment::where('thread', $thread->id)->count();
        }
        return view('home', ['threads' => $threads, 'commentsPerThread' => $commentsPerThread]);
    }
}
