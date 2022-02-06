@extends('layouts.app')

@section('title','posts')

@section('content')


    @foreach($posts as $key => $post)
        <div>{{ $key }}. {{ $post['title'] }}</div>
    @endforeach



@endsection
