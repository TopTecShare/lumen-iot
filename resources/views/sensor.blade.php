<html>
    <head>
        <title>CNAM</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        />
        <link
            rel="stylesheet"
            href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"
        />
    </head>
    <style>
        body {
            word-break: break-word;
        }
        .right {
            float: right;
            margin-right: 10%;
        }
    </style>

    <body class="container">
        @include('navbar')
        <span style="font-weight: bold; font-size: 1.5em"> Nickname: </span
        >{{ $sensor->nickname }}

        <a class="right"
            ><form action="/sensors" accept-charset="UTF-8" method="post">
                <input
                    type="hidden"
                    class="form-control"
                    name="uuid"
                    value="{{$sensor->uuid}}"
                />
                @if($dashboard)
                <input
                    type="submit"
                    class="btn btn-success"
                    value="Remove From Dashboard"
                />
                <input type="hidden" name="_method" value="DELETE" />
                @else
                <input
                    type="submit"
                    class="btn btn-success"
                    value="Add To Dashboard"
                />
                @endif
            </form></a
        >
        <a class="btn btn-success right" data-toggle="modal" href="#nickname">
            @if($sensor->nickname == "") <span>Add </span> @else
            <span>Edit </span> @endif Nickname
        </a>

        <table class="table datatable">
            <thead>
                <tr>
                    <th>Json</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($json as $dp)
                <tr>
                    <td>{{ print_r($dp->json, true) }}</td>
                    <td>{{ $dp->created_at->setTimeZone($tz) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $json->links('pagination::bootstrap-4') }}
        </div>
        <div id="nickname" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form
                        action="/sensors"
                        accept-charset="UTF-8"
                        method="post"
                    >
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="modal-header">
                            <h4 class="modal-title">Nickname</h4>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true"
                            >
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nickname</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nickname"
                                    value="{{$sensor->nickname}}"
                                />
                                <input
                                    type="hidden"
                                    class="form-control"
                                    name="uuid"
                                    value="{{$sensor->uuid}}"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input
                                type="button"
                                class="btn btn-default"
                                data-dismiss="modal"
                                value="Cancel"
                            />
                            <input
                                type="submit"
                                class="btn btn-success"
                                value="Confirm"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
