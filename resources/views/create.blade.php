@extends('layouts.main')
@section('title','Add Post Page')
@section('content')
<h1 class="text-center my-3">Simple Blog</h1>
<div class="container">
    <div class="card mb-4">
        <div class="card-header text-center">
            Create New Post
        </div>
        <div class="card-body">
            <form action="/posts" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title')
                        is-invalid
                    @enderror" name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description')
                        is-invalid
                    @enderror" cols="30" rows="5"> {{old('description')}}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                   <select name="category_id" class="form-control @error('category_id')
                        is-invalid
                    @enderror">
                       <option value="">Select Category</option>
                       @foreach ($categories as $category)
                           <option value="{{$category->id}}">
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
