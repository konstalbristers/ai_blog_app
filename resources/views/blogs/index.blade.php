@extends('layouts.app')
@php $header = ''; @endphp


@section('content')
<div class="container">
    <h1>AI Generated Blogs</h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New</a>
    <hr>
    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
