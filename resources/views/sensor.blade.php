<html>
    <head>
        <title>CNAM</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />
    </head>
    <body class="container">
        AAA
        <table class="table">
            @foreach($sensor->rawDataPoints as $dp)
            <tr>
                <td>
                    {{ print_r($dp->json, true) }}
                </td>
                <td>{{$dp->created_at->setTimeZone($tz)}}</td>
            </tr>
            @endforeach
        </table>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
