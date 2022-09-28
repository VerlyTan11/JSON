<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<style>
    * {
        font-family: 'Saira', sans-serif;
        margin-left: 50px;
    }

    body {
        background-image: url(bg.jpg);
    }

    h1  {
        font-weight: bold;
        float: left;
        text-decoration: underline;
        margin-top: 50px;
        margin-left: 0;
    }

    .input-group {width: 80%;}

    button {
        float: right;
        margin-right: 100px;
        margin-top: 50px;
    }

    p {
        font-weight: bolder;
    }
</style>
<body>
    <form action="login.php" method="get">
        <h1>LOGIN</h1>
        
        <br><br><br><br><br><br><br><br>

        <p><i>Username</i></p>
        <div class="input-group input-group-sm mb-3">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="nama">
        </div>

        <br>

        <p><i>Password</i></p>
        <div class="input-group input-group-sm mb-3">
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="pass">
        </div>

        <br><br>

        <button type="submit" class="btn btn-outline-primary" value="login">Login</button>
    </form>
</body>
</html>