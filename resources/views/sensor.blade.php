<html>
<head>
    <title>CNAM</title>
</head>
<body>
AAA
<table>
    @foreach($sensor->rawDataPoints as $dp)
        <tr>
            <td>

                @foreach( json_decode($dp->json) as $k=> $v)
                    {{$k}}
                    {{$v}}
                    <br/>
                @endforeach
            </td>
            <td>{{$dp->created_at}}</td>
        </tr>
    @endforeach

</table>
</body>
</html>
