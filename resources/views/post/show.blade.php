@extends('layout')

@section('content')

    <post-details :post-data-val="{{ json_encode($post) }}" :connect-data="'{{ csrf_token() }}'"></post-details>




<h1>Komentāri</h1>
<ul class="list-group">
    @foreach($post->comments as $comment)
        <li class="list-group-item">
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

@if (count($errors) > 0)
    <h2>Jūsu ievadītajos datos bija nepilnības</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

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



