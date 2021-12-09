<html>

<head>
    <title>CNAM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body class="container">
    <form action="/reset-password" accept-charset="UTF-8" method="post">
        @if($user)
        <input type="text" hidden value="{{$user->email}}" name="email" />
        <input name="old" hidden value="{{$user->password}}" required /> @else
        <p>
            adres e-mail:
            <br />
            <input type="text" value="" name="email" />
        </p>
        <p>
            stare hasło
            <br />
            <input name="old" required />
        </p>
        @endif
        <p>
            nowe hasło
            <br />
            <input type="password" id="password" name="password" required />
        </p>
        <p>
            potwierdź hasło
            <br />
            <input type="password" id="password_confirm" name="password_confirm" required />
        </p>

        <p>
            <input type="submit" name="commit" class="btn btn-success" value="potwierdź" class="btn" />
        </p>
    </form>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $("form").validate({
            rules: {
                password: {
                    minlength: 5,
                },
                password_confirm: {
                    minlength: 5,
                    equalTo: "#password",
                },
            },
        });
    </script>
</body>

</html>