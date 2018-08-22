@extends('layout')

@section('content')

<h1>Dienasgrāmatas ieraksts {{ $post->id }}</h1>

<h2>{{ $post->title }}</h2>
<p>{{ $post->text }}</p>

<p><a href="{{ action('PostController@edit', $post) }}">Labot šo ierakstu</a></p>

<h1>Komentāri</h1>
<ul>
    @foreach($post->comments as $comment)
        <li>
            Autors: {{ $comment->email }}
            Datums: {{ $comment->created_at }}<br>
            {{ $comment->comment }}

            <form action="{{ action('CommentController@deleteAll', [ $comment->id, $post]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit">Block this person</button>
            </form>
        </li>
    @endforeach
</ul>
<form action="{{ action('CommentController@store', $post) }}" method="post">
    <h2>Komentēt</h2>
    {{ csrf_field() }}

    <div class="form-group">
        <label for="email"> Tavs epasts</label>
        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="comment"> Tavs komentārs </label>
        <textarea id="comment" class="form-control" name="comment">{{ old('comment') }}</textarea>

    </div>
    <button type="submit" class="btn btn-primary">Komentēt</button>

</form>
@endsection