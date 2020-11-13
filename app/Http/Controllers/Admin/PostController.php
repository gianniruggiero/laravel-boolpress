<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewPost2;
use Illuminate\Support\Facades\Mail;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_id = Auth::id();
       $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
       return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate ([
            'title'=>'required',
            'post_text'=>'required',
            'abstract'=>'required',
            'slug'=>'required|unique:posts',
            'image'=>'image'
        ]);

        $newPost = new Post;
        $newPost->title = $request->title;
        $newPost->post_text = $request->post_text;
        $newPost->abstract = $request->abstract;
        $newPost->slug = $request->slug;

        $logged_user_id = Auth::id();
        $newPost->user_id = $logged_user_id;
        
        if ($request->image) {
            $imageUri = Storage::disk('public')->put('images/'.$logged_user_id, $data['image']);
            $newPost->image = $imageUri;
        }

        $newPost->save();

        $user_email = $newPost->user->email;
        
        ($user_email);

        //invia all'utente email di creazione di un nuovo post
        // Mail::to($user_email)->send(new NewPostMail($newPost));
        Mail::to($user_email)->send(new NewPost2($newPost));

        if ($request->tags) {

            foreach ($request->tags as $tag) {
                $newPost->tags()->attach($tag);
            }
        }

        return redirect()->route('admin.posts.show', $newPost->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = $post->tags;
        
        return view('admin.posts.show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate ([
            'title'=>'required',
            'post_text'=>'required',
            'abstract'=>'required',
            'slug'=>[
                'required',
                'unique:posts,slug,'.$id
            ],
            'image'=>'image'
        ]);

        $editPost = Post::find($id);

        $editPost->title = $request->title;
        $editPost->post_text = $request->post_text;
        $editPost->abstract = $request->abstract;
        $editPost->slug = $request->slug;

        $logged_user_id = Auth::id();
        $editPost->user_id = $logged_user_id;
        
        if ($request->image) {
            $imageUri = Storage::disk('public')->put('images/'.$editPost->user_id, $data['image']);
            $editPost->image = $imageUri;
        }

        $editPost->update();
        return redirect()->route('admin.posts.show', $editPost->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyModal(Request $request)
    {
        $id = request()->input_id;
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

}
