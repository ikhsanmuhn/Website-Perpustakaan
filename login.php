<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>LOGIN | Pustakawan</title>
</head>
<body>
    <div class="container-fluid bc">
        <div class="col-md-4 gb">
        <a href="index.html" ><img class="bag" src="img/back.png" style="margin-bottom:30px; width: 50px; heightL 50px;"></a>
        </div>
        <img src="img/pustakawan.png" class="logo">
        <div class="col-md-4 login">
            <h3>Login</h3>
            <form action="ceklogin.php" method="POST">
                <input type="text" placeholder="Username" class="loginform" style="margin-top: 20px; margin-bottom: 20px;" name="username">
                <input type="password" placeholder="Password" class="loginform" name="pw">
                <button type="submit" class="masuk" name="login">Submit</button>
            </form> 
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>