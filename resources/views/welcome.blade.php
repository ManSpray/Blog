@extends('layouts.app')
@section('content')
    <h1>Hello world!!</h1>
    <p>{{ 2 == 2 ? "Equals" : "Does not equal" }}</p>
    
    {{-- @if ($people)
        @foreach($people as $person)
            {{ $person->age }}
            {{ $person->name }}
            <br>
        @endforeach
    @endif --}}

    {{-- My person:
    Name :  {{ $person->name . " age" . $person->age }} --}}

    {{-- @foreach($names as $name)
        {{ $name }}
        <br>

        <h1>Hello {{ $name }}!</h1>

        @if ($name === 'Jonas')
            Hi Mr. {{ $name }} !
        @elseif ($name === 'Jonė')
            Hi Mrs. {{ $name }} !
    @endif
	@endforeach --}}

@endsection