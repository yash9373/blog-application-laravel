<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $blogs = Blog::factory()->create([
            'user_id' => $user->id,
        ]);
        $blogs = Blog::all();

        if ($blogs->isEmpty()) {
            dd('No blogs found.');
        }
        foreach ($blogs as $blog) {
            Comment::factory(4)->create([
                'blog_id' => $blog->id,
                'user_id' => $user->id,
            ]);
        }
    }
}






// ==============
// CRUD

// Products::create([
//     'title' => 'New Post',
//     'content' => 'Post content here.'
// ]);


// $posts = Products::all();
// foreach($products as $product) {
// 	echo "Name : ". $prduct->title;
// }
// $post = Products::find(1);

// $posts = Prodcuts::where(['title'=>'xyz'])->with('comments'=>function($query){
// 	$query->select()->active();
// })->select('adsfaf','asdfas')->get() - 1,2
// foreach($products as $product) {
// 	echo "Name : ". $prduct->title;
// 	$coments = $product->comments;
// 	foreach($comments as $coment) {
// Anupam Ojha
// 11:01
// echo "Name : ". $prduct->title;
// 	$coments = $product->comments;
// 	foreach($comments as $coment) {
// 	}
// }
// 11 - 
// PUT /products/{id}
// $post = Post::find(1);
// $post->update(['title' => 'Updated Title']);

// DeELET /products/{id}
// $post = Post::find(1);
// $post->delete();



// public function scopeActive($query)
// {
//     return $query->where('status', 'active');
// }

// $posts = Post::active()->get();