<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Blog;

use App\Http\Requests\CreateBlogRequest;

class BlogController extends Controller
{
    public function store(CreateBlogRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id,
            'publish' => $request->publish
        ];

        if ($request->hasFile('banner')) {
            $file_name = str_replace(' ', '_', $request->file('banner')->getClientOriginalName());
            $request->file('banner')->storeAs('banner', $file_name, 'public');
            $data['banner'] = asset('banner/'. $file_name);
        }

        Blog::create($data);

        return redirect('home');
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

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'publish' => $request->publish
        ];

        if ($request->hasFile('banner')) {
            $file_name = str_replace(' ', '_', $request->file('banner')->getClientOriginalName());
            $request->file('banner')->storeAs('banner', $file_name, 'public');
            $data['banner'] = asset('banner/'. $file_name);
        }

        $blog->update($data);

        return redirect('home');
    }
}
