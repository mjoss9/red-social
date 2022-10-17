<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\PostFormRequest ;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Events\SomeonePostedEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\PostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $filename=null;
        if($request->file('photo')){
            $file=$request->file('photo');
            $filename=time().".".$file->getClientOriginalExtension();
            $request->file('photo')->storeAs('public/assets',$filename);
        }
        $data = $request->only(['body', 'user_id', 'parent_id']);
        if((auth()->user()->id != $data['user_id']) && (!auth()->user()->is_friend_with($request->user_id))) {
            return back()->withErrors(['message'=>'Deben ser amigos primero!']);
        }
        if((auth()->user()->id != $data['user_id']) && (auth()->user()->is_friend_with($request->user_id))) {
            Post::create([
                'body'=> $data['body'],
                'parent_id'=> $data['user_id'],
                'user_id'=>auth()->user()->id,
                'image_path'=>(($request->file('photo'))?'assets/'.$filename:$filename),
                'file_type'=>(($request->file('photo'))?$file->getClientOriginalExtension():null),

            ]);
            if($request->file('photo')){
                $request->file('photo')->storeAs('public/assets',$filename);
            }

            $user = User::where('id', $data['user_id'])->first();
            event(new SomeonePostedEvent($user, auth()->user()));
            return back();
        }
        if((auth()->user()->id = $data['user_id'])) {
            auth()->user()->posts()->create([
                'body'=> $data['body'],
                'image_path'=>(($request->file('photo'))?'assets/'.$filename:$filename),
                'file_type'=>(($request->file('photo'))?$file->getClientOriginalExtension():null),


            ]);
            if($request->file('photo')){
                $request->file('photo')->storeAs('public/assets',$filename);
            }
            return back();
        }

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
    public function destroy(Post $post) {
        if((auth()->user()->id != $post->user_id) && (!auth()->user()->is_friend_with($post->user_id))) {
            return back()->withErrors(['message'=>'No puedes borrar este post!']);
        }
        if((auth()->user()->id != $post->user_id) && (auth()->user()->id != $post->parent_id)) {
            return back()->withErrors(['message'=>'No puedes borrar este post!']);
        }
        if((auth()->user()->id != $post->user_id) && (auth()->user()->id = $post->parent_id)) {
            $post->delete();
            return back();
        }
        if((auth()->user()->id = $post->user_id)) {
            $post->delete();
            return back();
        }
    }
}
