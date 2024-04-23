<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('home', compact('comments'));
    }

    public function store(Request $request)
    {
        // Validation can be added here
        Comment::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content')
        ]);

        return redirect()->route('home');
    }

    public function edit(Comment $comment)
    {
        // Only the user who created the comment can edit it
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('home', compact('comments', 'comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Only the user who created the comment can update it
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validation can be added here
        $comment->update([
            'content' => $request->input('content')
        ]);

        return redirect()->route('home');
    }

    public function destroy(Comment $comment)
    {
        // Only the user who created the comment can delete it
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->route('home');
    }
}
