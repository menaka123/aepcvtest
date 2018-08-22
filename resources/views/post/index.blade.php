@extends('layout')

@section('content')

<ul>
    @foreach ($posts as $post)
        <li><a href="{{ action('PostController@show', $post) }}">{{ $post->id }}: {{ $post->title }}</a>
                <form action="{{ action('PostController@destroy', $post) }}" method="post">
                        Created : {{ $post->created_at }} |
                        Updated : {{ $post->updated_at }} <br>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                </form>
    @endforeach
</ul>
<p><a href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a></p>
@endsection