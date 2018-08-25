<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    //

    public function index()
    {

        $posts = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(5)->get();;

        $comments = Comment::all();

        $comments = Comment::select('email', DB::raw('count(*) as total'))
            ->orderBy('total', 'desc')
            ->groupBy('email')->take(5)
            ->get();

        return view('dashboard', ["posts"=>$posts, 'comments'=>$comments]);
    }
}
