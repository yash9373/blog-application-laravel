<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class blogControler extends Controller
{
    public function addBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'require',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'

        ]);
        $imagePath = $request->file('image')->store('images', 'public');

        blog::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => Auth::user()->name,
            'image' => $imagePath,
            'description' => $request->description,
        ]);
        Session::flash('success', 'Blog added successfully!');


        return redirect('/')->with('success', 'Blog post added successfully!');
    }

    public function showAllBlogs()
    {
        $blogs = blog::all();
        return view('pages.home', compact('blogs'));
    }

    public function deleteBlog($id)
    {
        $blog = blog::find($id);
        if ($blog) {
            $blog->delete();
        }
        return redirect('/myBlog');
    }

    function searchBlog(Request $request)
    {
        $search = $request->input('search');
        //echo json_encode(['search' => $search]);
        // if (empty($search)) {
        //     return response()->json(['message' => 'Search term is required'], 400);
        // }

        $filtered_blogs = Blog::where('author', 'like', "%{$search}%")->orWhere('title', 'like', "%{$search}%")
            ->get();

        return view('pages.home', ['blogs' => $filtered_blogs]);
    }
}
