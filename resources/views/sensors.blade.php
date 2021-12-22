<html>
    <head>
        <title>CNAM</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"
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
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".datatable").DataTable({
                    language: {
                        sProcessing: "Przetwarzanie...",
                        sLengthMenu: "Pokaż _MENU_ pozycji",
                        sZeroRecords: "Nie znaleziono pasujących pozycji",
                        sInfoThousands: " ",
                        sInfo: "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                        sInfoEmpty: "Pozycji 0 z 0 dostępnych",
                        sInfoFiltered:
                            "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                        sInfoPostFix: "",
                        sSearch: "Szukaj:",
                        sUrl: "",
                        oPaginate: {
                            sFirst: "Pierwsza",
                            sPrevious: "Poprzednia",
                            sNext: "Następna",
                            sLast: "Ostatnia",
                        },
                        sEmptyTable: "Brak danych",
                        sLoadingRecords: "Wczytywanie...",
                        oAria: {
                            sSortAscending:
                                ": aktywuj, by posortować kolumnę rosnąco",
                            sSortDescending:
                                ": aktywuj, by posortować kolumnę malejąco",
                        },
                    },
                });
            });
        </script>
    </body>
</html>
