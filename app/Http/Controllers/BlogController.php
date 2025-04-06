<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        return Blog::create([
            'title' => 'Hello',
            'content' => 'This is the content',
            'user_id' => $request->user()->id
        ]);
    }
}
