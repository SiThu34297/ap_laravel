@extends('layouts.main')
@section('title','Post Page')
@section('content')
<h1 class="text-center my-3">Simple Blog</h1>
<div class="container">
    <div class="card mb-4">
        <div class="card-header text-center">
            Content
        </div>
        <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text text-primary"> Category : {{$post->category->name}}</p>
                <a href="/posts" class="btn btn-primary">
                Back</a>
        </div>
    </div>
</div>
@endsection
