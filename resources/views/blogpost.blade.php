@extends('layouts.app')
@section('content')
    {{-- tikrinam ar rysys veikia --}}
    {{-- {{ var_dump($post->comments) }} --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    {{-- Hide buttons if the user is not logged in --}}
    @if (auth()->check())
        <form action="{{ route('posts.update', $post['id']) }}" method="POST">
            @method('PUT') @csrf
            <input type="text" name="title" value="{{ $post['title'] }}"><br>
            <input type="text" name="text" value="{{ $post['text'] }}"><br>
            <input type="submit" value="UPDATE">
        </form>
    @endif

    <p style="font-size: 10px; margin-top: 15px">Comments: </p>
    @foreach ($post->comments as $comment)
        <p style="font-size: 10px">{{ $comment['text'] }}</p>
    @endforeach
    <form action="{{ route('posts.comments.store', $post['id']) }}" method="POST">
        @csrf
        <input type="text" name="text"><br>
        <input type="submit" value="ADD COMMENT">
    </form>

@endsection
