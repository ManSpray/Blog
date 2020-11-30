@extends('layouts.app')
@section('content')
    {{-- Database error/success display logic --}}
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    {{-- Validation error, for invalid incoming data display logic
    --}}
    {{-- @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger" style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif --}}


    @foreach ($posts as $post)
        {{-- <h1>{{ $post->title }}</h1>
        <p>{{ $post->text }}</p> --}}
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['text'] }}</p>
        <p style="font-size: 10px">Author: {{ $post['user']['name'] }} | Comment count: {{ count($post->comments) }}
            | <a href="{{ route('posts.show', $post['id']) }}">View post details and comment on it</a></p>
        {{-- , {{ $post['user']['email'] }} --}}

        {{-- Hide buttons if the user is not logged in --}}
        @if (auth()->check())
            @if (auth()->user()->id === $post['user_id'])
                {{-- <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    --}}
                    <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                        @method('DELETE') @csrf
                        <input type="submit" value="DELETE">
                    </form>
            @endif
            {{-- <form action="{{ route('posts.show', $post->id) }}" method="GET">
                --}}
                <form action="{{ route('posts.show', $post['id']) }}" method="GET">
                    <input type="submit" value="UPDATE">
                </form>
        @endif
        <br><br>
    @endforeach

    <hr>
    <form class="container" method="POST" action="/posts">
        @csrf
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="title">Post title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="text">Post text:</label><br>
        <input type="text" id="text" name="text"><br><br>
        <input type="submit" value="Submit">
    </form>

@endsection
