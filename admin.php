<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmart C-panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="bg-dark">
    <form action="/webmart-ng/cpanel-op.php" method="post">
        <div class="card m-5 p-5 w-50 mx-auto shadow-md">
            <div class="form-group">
                <input class="form-control text-warning" type="text" name="username" placeholder="username here">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="email here">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="password" placeholder="password">
            </div>
            <button class="btn btn-primary  text-warning" type="submit" name="adminSignup">Sign Up</button>
        </div>
    </form>
</body>

</html>