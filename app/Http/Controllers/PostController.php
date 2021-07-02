<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PostController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $posts = Post::get();
       return response()->json($posts);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::insert([
            'title' => $request->title,
            'description' => $request->description,
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => null,
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Post  $posts
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $post = Post::where('id', $id)->first();
       return response()->json($post);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Post  $posts
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
  
       $post->fill($request->post())->save();
       return response()->json([
           'message'=>'Post Updated Successfully!!',
           'posts'=>$post
       ]);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $posts
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post Deleted Successfully!!'
        ]);
    }
    
    public function postsearch(Request $request)
    {
        Log::info("postsearch");
        Log::info($request->keyword);
        $posts = Post::query()
            ->where('title', 'LIKE', "%$request->keyword%")
            ->orWhere('description', 'LIKE', "%$request->keyword%")
            ->orWhere('create_user_id', 'LIKE', "%$request->keyword%")
            ->get();

        return response()->json($posts);

    }

}