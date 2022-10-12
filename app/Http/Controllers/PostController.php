<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ImageModel;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'categories' => Categories::with('user')->latest()->get(),
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            foreach ($request->image as $imageFile) {
                $image = Image::make($imageFile);
                /**
                 * Main Image Upload on Folder Code
                 */
                $imageName = str_replace(' ','-',$imageFile->getClientOriginalName());
                $destinationPath = public_path('images/standard/');
                $image->save($destinationPath.$imageName);
                /**
                 * Generate Thumbnail Image Upload on Folder Code
                 */
                $destinationPathThumbnail = public_path('images/thumbnail/');
                $image->save($destinationPathThumbnail.$imageName, 50);

                $postModel = new Post();
                $postModel->message = str_replace(' ','-',$imageFile->getClientOriginalName());
                $postModel->categories_id = $request->categories_id;
                $postModel->user_id = auth()->id();
                $postModel->save();
            }
            return redirect(route('posts.index'));
        }
        //$request->user()->posts()->create($validated);
 
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
 
        $post->delete();
        unlink("images/standard/$post->message");
        unlink("images/thumbnail/$post->message");
        return redirect(route('posts.index'));
    }
}
