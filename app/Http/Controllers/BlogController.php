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
        dd($request->all());
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id,
            'publish' => $request->publish
        ]);

        return redirect('/home');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $blog = Blog::find($id);
        $blog->delete();

        return back();
    }

    public function find(Request $request, int $id): View
    {
        $blog = Blog::find($id);

        return view('create', ['blog' => $blog]);
    }

        public function edit(CreateBlogRequest $request, int $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'publish' => $request->publish
        ]);

        return redirect('home');
    }
}
