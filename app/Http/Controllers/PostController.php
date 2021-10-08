<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use App\Notifications\PostCreatedNotification;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $user = User::find(1);
        // $user->notify(new PostCreatedNotification());
        // Notification::send(User::find(1), new PostCreatedNotification());
        $posts = Post::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('index',compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StorePostRequest $request)
    {
        $validate = $request->validated();
        $post = Post::create($validate + ['user_id' => auth()->user()->id]);
        event(new PostCreatedEvent($post));
        return redirect('/posts')->with('status', config('aprogrammer.message.create'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Post $post)
    {
        // if($post->user_id !== auth()->user()->id){
        //     abort(403);
        // }
        $this->authorize('view', $post);
        return view('post',compact('post'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        // if($post->user_id !== auth()->user()->id){
        //     abort(403);
        // }
        $this->authorize('view', $post);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(StorePostRequest $request, Post $post)
    {
        $validate = $request->validated();
        $post->update($validate);
        return redirect('/posts')->with('status',config('aprogrammer.message.update'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status',config('aprogrammer.message.delete'));
    }
}