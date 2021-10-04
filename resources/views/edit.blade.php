@extends('layouts.main')
@section('title','Edit Page')
@section('content')
<h1 class="text-center my-3">Simple Blog</h1>
<div class="container">
    <div class="card mb-4">
        <div class="card-header text-center">
            Edit Post
        </div>
        <div class="card-body">
            <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input value="{{old('title') ?? $post->title}}" type="text" class="form-control  @error('title')is-invalid @enderror" name="title">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description')is-invalid @enderror" cols="30" rows="5"> {{old('description')??$post->description}}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                   <select name="category_id" class="form-control">
                       <option value="">Select Category</option>
                       @foreach ($categories as $category)
                           <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                       @endforeach
                   </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
