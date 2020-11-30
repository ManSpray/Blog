@extends('layouts.app')
@section('content')
    <h1>About</h1>
    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
    @endfor
@endsection
