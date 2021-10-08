<html>
<head>
    <title>CNAM</title>
</head>
<body>
AAA
<table>
    @foreach($sensors as $sensor)
        <tr>
            <td>{{$sensor->uuid}}</td>
        </tr>
    @endforeach

</table>
</body>
</html>
