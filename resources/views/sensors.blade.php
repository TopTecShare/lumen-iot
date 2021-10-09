<html>
<head>
    <title>CNAM</title>
</head>
<body>
AAA
<table>
    @foreach($sensors as $sensor)
        <tr>
            <td><a href="/sensors/{{$sensor->uuid}}">{{$sensor->uuid}}</a>a</td>
            <td>{{$sensor->sensor_number}}</td>
        </tr>
    @endforeach

</table>
</body>
</html>
