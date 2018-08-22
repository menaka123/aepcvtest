
@extends('layout')

@section('content')


    <h1>Ieraksta {{ $post->id }} labošana</h1>

 @if (count($errors) > 0)
    <h2>Jūsu ievadītajos datos bija nepilnības</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<form action="{{ action('PostController@update', $post) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
        <label for="title"> Ieraksta virsraksts </label>
        <input id="title" class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-group">
        <label for="text"> Ieraksta teksts </label>
        <textarea id="text" class="form-control" name="text">{{ old('text', $post->text) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Izveidot</button>

</form>

@endsection