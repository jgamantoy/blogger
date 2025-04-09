<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\Blog;

use App\Http\Requests\CreateBlogRequest;

class BlogController extends Controller
{
    public function store(CreateBlogRequest $request): RedirectResponse
    {
        $user = auth()->user();

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id
        ]);

        return redirect('/home');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('home');
    }

    public function find(Request $request, int $id): View
    {
        $blog = Blog::find($id);

        return view('create', ['blog' => $blog]);
    }

        public function edit(Request $request, int $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('home');
    }
}
