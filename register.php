<?php
require 'user.php';
$errorUser = '';
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re_password'])) {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        if ($password != $re_password) {
            echo "<div class='container-fluid'>
            <div class='p-3 mb-2 bg-danger text-white text-center'>Password does not match</div>
          </div>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $registerUser = new User($conn);
            $registerUser->register($username, $email, $hashed_password);
        }

    }

} else {
    $errorUser = "<span class='text-center'>All fields must be filled out!</span>";
}

$error = new User($conn);


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
    <title>Register</title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand m-2">MiniBlog</span>
    </nav>
    <p class="text-center mt-2">Registration</p>
    <div class="container-register">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <p>See the Registration Rules</p>
            <?php echo $errorUser ?>
            <hr>

            <form action="" method="post">

                <input type="text" name="username" id="" placeholder="Enter Username"> <br>


                <input type="email" name="email" id="" placeholder="Enter Email"> <br>


                <input type="password" name="password" id="" placeholder="Enter Password"> <br>


                <input type="password" name="re_password" id="" placeholder="Confirm Password"> <br> <br>

                <input class="btn btn-success" type="submit" value="REGISTER"> <br>
                Return to the <span><a href="login.php">LOGIN PAGE</a></span>
            </form>
        </div>

    </div>



</body>

</html>