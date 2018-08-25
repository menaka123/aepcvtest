@extends('layout')

@section('content')

<h1>Jauna ieraksta izveidošana</h1>

 {{ method_field('PUT') }}

@if (count($errors) > 0)
    <h2>Jūsu ievadītajos datos bija nepilnības</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<form action="{{ action('PostController@store') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title"> Ieraksta virsraksts </label>
        <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
    </div>

    <div class="form-group">
        <label for="text"> Ieraksta teksts </label>
        <textarea id="text" class="form-control" name="text">{{ old('text') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Izveidot</button>

</form>

@endsection