<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'blog_id' => $request->input('blog_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
        }


        return redirect()->back()->with('success', 'Comment deleted!');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('pages.editcomment', ['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $coment = Comment::find($id);
        $coment->update([
            'content' => $request->input('content'),
        ]);
        return redirect('/blogPage/' . $coment->blog_id)->with('success', 'Comment updated successfully!');

    }
}
