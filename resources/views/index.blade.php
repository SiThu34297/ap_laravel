@extends('layouts.app')
@section('title','Home Page')
@section('content')
<h1 class="text-center my-3">Simple Blog</h1>
<div class="container">
    <div class="card mb-4">
        <div class="card-header text-center">
            Content
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <a href="#" class="btn btn-primary">View</a>
                <hr class="my-4">
            @endforeach
        </div>
    </div>
</div>
@endsection
