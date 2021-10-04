@extends('layouts.main')
@section('title','Home Page')
@section('content')
<h1 class="text-center my-3">Simple Blog</h1>
<div class="container">
    <a href="/posts/create" class="btn btn-primary mb-3">Add New Post</a>
    <a href="/logout" class="btn btn-secondary mb-3">Logout</a>
    <div class="card mb-4">
        <div class="card-header text-center">
            Content
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <div class="d-flex align-item-center">
                <a href="/posts/{{$post->id}}" class="btn btn-primary me-2">
                    View
                </a>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-warning me-2">
                    Edit
                </a>
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete
                    </button>
                </form>
            </div>
            <hr class="my-4">
            @endforeach
        </div>
    </div>
</div>
@endsection
