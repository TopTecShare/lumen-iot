<html>

<head>
    <title>CNAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        @media (min-width: 1400px) {
            .container {
                max-width: 90%;
            }
        }
        body{
            word-break: break-word;
        }
        .table-responsive {
            margin: 30px 0;
        }
        
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }
        
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        
        .table-title .btn-group {
            float: right;
        }
        
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        
        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        .interface {
                background-color: #04aa6d;
                color: white !important;
            }
    </style>
</head>

<body class="container">
    @include('navbar')
    <form action="/interface" accept-charset="UTF-8" method="post">
        <p>
            Komenda: <span style="color:red">@isset($error) {{ $error }} @endisset</span> <br>
            <textarea type="query" name="query" class="form-control" rows="15">{{$query}}</textarea>
        </p>
        <p><input type="submit" name="commit" class="btn btn-success" value="Załaduj" class="btn"></p>
    </form>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Query <b>Interface</b></h2>
                    </div>
                    <div class="col-xs-6">

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uuid</th>
                        <th>Json</th>
                        <th>Created at</th>
                        <th>Nickname</th>
                    </tr>
                    </tbody>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td><a href="/sensors/{{$result->uuid}}">{{$result->uuid}}</a
                                ></td>
                            <td>{{$result->json}}</td>
                            <td>{{$result->created_at}}</td>
                            <td>{{$result->nickname}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "language": {
                "sProcessing": "Przetwarzanie...",
                "sLengthMenu": "Pokaż _MENU_ pozycji",
                "sZeroRecords": "Nie znaleziono pasujących pozycji",
                "sInfoThousands": " ",
                "sInfo": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                "sInfoEmpty": "Pozycji 0 z 0 dostępnych",
                "sInfoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                "sInfoPostFix": "",
                "sSearch": "Szukaj:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pierwsza",
                    "sPrevious": "Poprzednia",
                    "sNext": "Następna",
                    "sLast": "Ostatnia"
                },
                "sEmptyTable": "Brak danych",
                "sLoadingRecords": "Wczytywanie...",
                "oAria": {
                    "sSortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                    "sSortDescending": ": aktywuj, by posortować kolumnę malejąco"
                }
            }
        });
    });
</script>

</html>