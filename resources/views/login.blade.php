<html>
<head>
    <title>CNAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="container">
<form action="/login" accept-charset="UTF-8" method="post">
    <p>
        Login lub adres e-mail:
        <br>
        <input type="text" value="" name="id">
    </p>
    <p>
        Hasło:
        <br>
        <input type="password" name="pwd">
    </p>
    <p><input type="submit" name="commit" class="btn btn-success" value="Zaloguj" class="btn"></p>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
