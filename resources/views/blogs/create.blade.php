@extends('layouts.app')
@php $header = ''; @endphp


@section('content')
<div class="container">
    <h1>Generate a Blog</h1>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Blog Title</label>
            <input type="text" name="title" class="form-control" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Generate</button>
    </form>
</div>
@endsection
