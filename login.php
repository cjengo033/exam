<?php
require 'user.php';

$userErr = '';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User($conn);
    $login_success = $user->login($email, $password);

    if (!$login_success) {
        $userErr = 'Wrong credential';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand m-2">MiniBlog</span>
    </nav>
    <div class="container-login">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <span class="error">
                <?php echo $userErr; ?>
            </span>
            <h3>Login</h3>
            <form action="" method="post">

                <input type="text" name="email" id="" placeholder="Enter Email"> <br>

                <input type="password" name="password" id="" placeholder="Enter Password"> <br>
                <input class="btn btn-success" type="submit" value="LOGIN"> <button class="btn btn-success"> <a
                        href="register.php">REGISTER</a></button>
            </form>
            <p>Currently Logged out.</p>
        </div>
    </div>




</body>

</html>