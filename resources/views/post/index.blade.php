<ul>
    @foreach ($posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
</ul>
<p><a href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a></p>