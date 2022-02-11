@extends('layouts.app')

@section('title','posts')

@section('content')

    @if(count($posts))

        @foreach($posts as $key => $post)
            @include('posts.partials.post')
        @endforeach

    @else
        No posts found!
    @endif

@endsection
