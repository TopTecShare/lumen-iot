<html>
    <head>
        <title>CNAM</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />
        <style>
            body {
                word-break: break-word;
            }
            .sensors {
                background-color: #04aa6d;
                color: white !important;
            }
        </style>
    </head>

    <body class="container">
        @include('navbar')

        <table class="table datatable">
            <thead>
                <th>No</th>
                <th>UUID</th>
                <th>Ile raportów</th>
                <th>Kiedy ostatni</th>
                <th>SensorID</th>
                <th>Nickname</th>
            </thead>
            <tbody>
                @foreach($sensors as $cnt => $sensor)
                <tr>
                    <td>{{ $cnt }}</td>
                    <td>
                        <a
                            href="/sensors/{{$sensor->uuid}}"
                            >{{$sensor->uuid}}</a
                        >
                    </td>
                    <td>{{$sensor->rawDatapoints()->count()}}</td>
                    <td>
                        @if($sensor->rawDatapoints()->count() > 0)
                        {{ time_elapsed_string($sensor->rawDatapoints()->orderBy('created_at', 'desc')->first()->created_at) }}
                        @endif
                    </td>
                    <td>{{$sensor->sensor_number}}</td>
                    <td>{{$sensor->nickname}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $sensors->links('pagination::bootstrap-4') }}
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
