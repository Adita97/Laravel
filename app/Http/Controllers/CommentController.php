<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();
    //     $comments = Comment::all();
    //    // return view('home', compact('comments'));
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|min:3',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'content' => $validatedData['content']
        ]);

        return redirect()->back()->with('success', 'Review created successfully');
    }

    public function edit(Comment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('home', compact('comments', 'comment'));
    }

    public function update(Request $request, Comment $comment)
    {

        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        
        $comment->update([
            'content' => $request->input('content')
        ]);

        return redirect()->back()->with('success', 'Review updated successfully');
    }

    public function destroy(Comment $comment)
    {
        
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Review deleted');
    }
}
