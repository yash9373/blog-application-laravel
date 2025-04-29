<?php
namespace App\Http\Controllers;

use App;
use App\Models\blog;
use App\Models\Category;
use App\Service\ProductService;
use App\Service\ServiceInterface;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;
use Session;

class blogControler extends Controller
{
    protected $service;
    protected $UserService;
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
        // App::bind('User', fn() => new \App\Service\ProductService());
        // $this->UserService = app('User');

        dd($this->service->show());
    }

    public function addBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories_table,id',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        blog::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => Auth::user()->name,
            'image' => $imagePath,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        Log::info('Blog created successfully');

        Session::flash('success', 'Blog added successfully!');
        return redirect('/')->with('success', 'Blog post added successfully!');
    }

    public function showAllBlogs()
    {
        $blogs = blog::all();
        $categories = Category::all();
        return view('pages.home', compact('blogs', 'categories'));
    }

    public function deleteBlog($id)
    {
        $blog = blog::find($id);
        if ($blog) {
            $blog->delete();
        }
        return redirect('/myBlog');
    }

    public function searchBlog(Request $request)
    {
        $search = $request->input('search');

        $filtered_blogs = blog::where('author', 'like', "%{$search}%")
            ->orWhere('title', 'like', "%{$search}%")
            ->get();

        return view('pages.home', ['blogs' => $filtered_blogs]);
    }

    public function filterBlogsByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');

        $categories = Category::all();

        $blogs = $categoryId ? blog::where('category_id', $categoryId)->get() : blog::all();

        return view('pages.home', compact('blogs', 'categories'));
    }
}


App::bind(ServiceInterface::class, UserService::class);