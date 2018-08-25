<?php

namespace App\Http\Controllers;

use App\BlockedCommenter;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        if(BlockedCommenter::where('email', $request->email)->first()){

            return back()->withErrors('You have been blocked from commenting!!');
        }


        $comment = new Comment;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $post->comments()->save($comment);

        return redirect()->action('PostController@show', $post);
    }


    //delete all comments by email
    public function deleteAll($id, $post_id)
    {

        $post = Post::findOrFail($post_id);
        $comment = Comment::findOrFail($id);
        $affected = Comment::where('email', '=', $comment->email )->delete();

        $blocked = new BlockedCommenter;
        $blocked->email = $comment->email;
        $blocked->save();

        return redirect()->action('PostController@show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dd($id);

        return redirect()->action('PostController@show');
    }
}
