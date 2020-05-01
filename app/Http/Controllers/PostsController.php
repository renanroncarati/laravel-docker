<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    //
    public function show($slug)
    {
        // $post = \DB::table('posts')->where('slug', $slug)->first();
        // $post = Post::where('slug', $slug)->first();
        // $post = Post::where('slug', $slug)->firstOrFail();

        // dd($post);
        // $posts = [
        //     'my-first-post' => 'Hello this is my first post',
        //     'my-second-post' => 'And that is my second post'
        // ];

        // if (!array_key_exists($post, $posts)) {
        //     abort(404, 'Sorry the post was not found');
        // }

        
        // if(!$post) abort(404, 'Sorry the post was not found.'); //firstOrFail do the work

        // return view('post', [
        //     'post' => $post
        // ]);
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
