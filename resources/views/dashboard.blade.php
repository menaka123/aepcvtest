@extends('layout')

@section('content')


    <div id="piechart"></div>

    <div id="piechart2"></div>

@endsection

@section('scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Post', 'Comments']
            @foreach ($posts as $post)
                ,['{{$post->title}}', {{$post->comments_count}}]
            @endforeach

        ]);


        var data_c2 = google.visualization.arrayToDataTable([
            ['Cementers', 'count']
            @foreach ($comments as $comment)
            ,['{{$comment->email}}', {{$comment->total}}]
            @endforeach

        ]);




        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Top 5 most commented post', 'width':550, 'height':400};

        var options2 = {'title':'Top 5 commented users', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);

        chart2.draw(data_c2, options2);
    }
</script>

</body>
</html>

@endsection