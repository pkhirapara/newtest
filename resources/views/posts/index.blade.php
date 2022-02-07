@extends('layouts.app')

@section('title','posts')

@section('content')

    @if(count($posts))

    @foreach($posts as $key => $post)
        <div>{{ $key }}. {{ $post['title'] }}</div>
    @endforeach

    @else
    No posts found!
    @endif



@endsection
