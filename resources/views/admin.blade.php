<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: "Varela Round", sans-serif;
            font-size: 13px;
        }
        
        .table-responsive {
            margin: 30px 0;
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
        
        table.table tr th:first-child {
            width: 60px;
        }
        
        table.table tr th:last-child {
            width: 100px;
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
        
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        
        table.table td a:hover {
            color: #2196f3;
        }
        
        table.table td a.edit {
            color: #ffc107;
        }
        
        table.table td a.delete {
            color: #f44336;
        }
        
        table.table td i {
            font-size: 19px;
        }
        
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        
        .pagination li a:hover {
            color: #666;
        }
        
        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03a9f4;
        }
        
        .pagination li.active a:hover {
            background: #0397d6;
        }
        
        .pagination li.disabled i {
            color: #ccc;
        }
        
        .pagination li i {
            font-size: 16px;
            padding-top: 6px;
        }
        
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Custom checkbox */
        
        .custom-checkbox {
            position: relative;
        }
        
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        
        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }
        
        .custom-checkbox label:before {
            content: "";
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        
        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: "";
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        
        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03a9f4;
            background: #03a9f4;
        }
        
        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }
        
        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        
        .modal .modal-dialog {
            max-width: 400px;
        }
        
        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }
        
        .modal .modal-content {
            border-radius: 3px;
        }
        
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        
        .modal .modal-title {
            display: inline-block;
        }
        
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        
        .modal textarea.form-control {
            resize: vertical;
        }
        
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        
        .modal form label {
            font-weight: normal;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b>Users</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                                    <span>Add New User</span></a
                                >
                                <a
                                    href="#deleteUsersModal"
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    ><i class="material-icons">&#xE15C;</i>
                                    <span>Delete</span></a
                                >
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll" />
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Nazwa</th>
                                <th>E-mail</th>
                                <th>Rola</th>
                                <th>hasło</th>
                                <th>Udział</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($users) @foreach ($users as $user)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input
                                            type="checkbox"
                                            id="checkbox1"
                                            name="options[]"
                                            value="1"
                                        />
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->password }}</td>
                                <td>
                                    <a
                                        href="#editUserModal"
                                        class="edit"
                                        data-toggle="modal"
                                        onclick="edit('{{$user->name}}, {{$user->email}}, {{$user->role}}, {{$user->password}}')"
                                        ><i
                                            class="material-icons"
                                            data-toggle="tooltip"
                                            title="Edit"
                                            >&#xE254;</i
                                        ></a
                                    >
                                    <a
                                        href="#deleteUserModal"
                                        class="delete"
                                        data-toggle="modal"
                                        onclick="del('{{ $user->email }}')"
                                        ><i
                                            class="material-icons"
                                            data-toggle="tooltip"
                                            title="Delete"
                                            >&#xE872;</i
                                        ></a
                                    >
                                </td>
                            </tr>
                            @endforeach @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Add Modal HTML -->
        <div id="addUserModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/admin" accept-charset="UTF-8" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">Add User</h4>
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
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input
                                    class="form-control"
                                    name="role"
                                    required
                                    oninvalid="this.setCustomValidity('Please write correct role(user or admin).')"
                                />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input
                                    type="text"
                                    name="password"
                                    class="form-control"
                                    required
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
                                value="Add"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editUserModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/admin" accept-charset="UTF-8" method="post">
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
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
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input
                                    class="form-control"
                                    name="role"
                                    required
                                    oninvalid="this.setCustomValidity('Please write correct role(user or admin).')"
                                />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="password"
                                    required
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
                                class="btn btn-info"
                                value="Save"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete User Modal HTML -->
        <div id="deleteUserModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/admin" accept-charset="UTF-8" method="post">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="email" />
                        <div class="modal-header">
                            <h4 class="modal-title">Delete User</h4>
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
                            <p>Are you sure you want to delete this Record?</p>
                            <p class="text-warning">
                                <small>This action cannot be undone.</small>
                            </p>
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
                                class="btn btn-danger"
                                value="Delete"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Users Modal HTML -->
        <div id="deleteUsersModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Delete User</h4>
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
                            <p>
                                Are you sure you want to delete these Records?
                            </p>
                            <p class="text-warning">
                                <small>This action cannot be undone.</small>
                            </p>
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
                                class="btn btn-danger"
                                value="Delete"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--      Page   Script                     -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Select/Deselect checkboxes
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function () {
                    if (this.checked) {
                        checkbox.each(function () {
                            this.checked = true;
                        });
                    } else {
                        checkbox.each(function () {
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function () {
                    if (!this.checked) {
                        $("#selectAll").prop("checked", false);
                    }
                });
            });
            const edit = (user) => {
                user = user.split(', ');
                $('#editUserModal').find('input[name="name"]').val(user[0]);
                $('#editUserModal').find('input[name="email"]').val(user[1]);
                $('#editUserModal').find('input[name="role"]').val(user[2]);
                $('#editUserModal').find('input[name="password"]').val(user[3]);
            };
            const del = (email) => {
                $('#deleteUserModal').find('input[name="email"]').val(email);
            }
        </script>
    </body>
</html>