<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->comment = $request->input('body');
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully',
            'comment' => $comment
        ]);
    }

    public function reload(Request $request) {
        $comments = Comment::all()->take(4)->reverse();

        return view('components.more-comments', compact('comments'));
    }

    public function destroy(Request $request)
    {
        $id = $request->input('comment_id');
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully',
            'comment' => $comment
        ]);
    }

    public function likeComment($id)
    {
        $comment = Comment::find($id);

        if ($comment->liked(auth()->user()->id)) {
            $comment->unlike();
            $comment->save();
        } else {
            $comment->like();
            $comment->save();
        }

        $liked = $comment->liked(auth()->user()->id);

        return response()->json([
            'likeCount' => $comment->likeCount,
            'liked' => $liked
        ]);
    }

    public function more(Request $request)
    {
        $lastCommentId = $request->input('last_comment_id');
        $comments = Comment::where('id', '>', $lastCommentId)->limit(4)->latest()->get();
        
        return view('components.more-comments', compact('comments'));
    }
}
