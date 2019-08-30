<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CommentCreateRequest;
use App\Http\Requests\Frontend\CommentUpdateRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentCreateRequest $request, $postId)
    {
        $post    = Post::find($postId);
        $comment = new Comment([
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
        ]);
        $post->comments()->save($comment);
        return redirect()->back()->withSuccess('Mensaje Enviado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, $postId, $commentId)
    {
        $post    = Post::find($postId);

        $comment = Comment::find($commentId);
        $comment->update([
            'answer' => $request->answer
        ]);
        return redirect()->back()->withSuccess('Mensaje Enviado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
