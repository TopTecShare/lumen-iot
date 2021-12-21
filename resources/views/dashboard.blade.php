<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: "Varela Round", sans-serif;
            font-size: 13px;
            word-break: break-word;
        }
        
        .table-responsive {
            margin: 30px 0;
            color: blue;
        }
        
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }
        
        .table-title {
            padding-bottom: 15px;
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
        
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        
        table.table tr th,
        table.table tr td {
            color: darkslategray;
            vertical-align: middle;
        }

        .dashboard {
            background-color: #04aa6d;
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('navbar')
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2><b>Dashboard</b></h2>
                        </div>

                    </div>
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>4H</th>
                                <th>24H</th>
                                <th>7D</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dashboard as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value[0] }}</td>
                                <td>{{ $value[1] }}</td>
                                <td>{{ $value[2] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br />
                    <br />
                    <br />
                    <table class="table datatable">
                        <thead>

                        </thead>
                        <tbody>
                            @foreach($dashboards as $dash)
                            <tr>
                                <td style="display:flex; justify-content: space-between; font-weight:bold;">
                                    <a href="/sensors/{{$dash->sensor->uuid}}">{{$dash->sensor->uuid}}</a
                                        >
                                    <span> {{$dash->sensor->rawDatapoints()->count()}}</span>

                                <span>  
                                        @if($dash->sensor->rawDatapoints()->count() > 0)
                                            {{ time_elapsed_string($dash->sensor->rawDatapoints()->orderBy('created_at', 'desc')->first()->created_at) }}
                                        @endif
                                    </span>

                                <span> {{$dash->sensor->sensor_number}} </span>

                                </td>
                                <td>{{$dash->sensor->nickname}}</td>
                            </tr>
                            @foreach($dash->sensor->rawDataPoints as $dp)
                            <tr>

                                <td>{{ print_r($dp->json, true) }}</td>

                                <td>{{ $dp->created_at->setTimeZone($tz) }}</td>
                            </tr>
                            @if(++$loop->index > 2) @break @endif @endforeach @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!--      Page   Script                     -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $('document').ready(() => {
                setInterval(() => {
                    location.href = location.href;
                }, 1000000);
            })
        </script>
</body>

</html>