{{--@if($loop->even)
    <div>
        {{ $key }}.{{ $post->title }}
    </div>
@else
    <div style="background-color: #0b5ed7">
        {{ $key }}.{{ $post->title }}
    </div>
@endif--}}

<div>{{ $key }}. {{ $post->title }}</div>

<div>
    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <input type="submit" value="Delete!">
    </form>
</div>
