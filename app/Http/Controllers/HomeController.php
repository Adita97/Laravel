<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Http\Controllers\CommentController;


class HomeController extends Controller
{
    //
    public function index() {

        $comments = Comment::all();
        return view("index", compact('comments'));
    }
}
