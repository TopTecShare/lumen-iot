<html>
<head>
    <title>CNAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container">
AAA
<table class="table">
    <thead>
    <th>UUID</th>
    <th>Ile raportów</th>
    <th>Kiedy ostatni</th>
    <th>SensorID</th>
    </thead>
    <tbody>
    @foreach($sensors as $sensor)
        <tr>
            <td><a href="/sensors/{{$sensor->uuid}}">{{$sensor->uuid}}</a></td>
            <td>{{$sensor->rawDatapoints()->count()}}</td>
            <td>@if($sensor->rawDatapoints()->count() > 0)
                    {{ time_elapsed_string($sensor->rawDatapoints()->orderBy('created_at', 'desc')->first()->created_at) }}
                @endif


            </td>
            <td>{{$sensor->sensor_number}}</td>
        </tr>
    @endforeach

    </tbody>

</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
