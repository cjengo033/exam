<?php
require 'blog.php';
session_start();
$username = $_SESSION['username'];
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $blog = new Blog($conn);
    $blog->create($title, $content, $username);
}

if (isset($_SESSION['username'])) {
    $_SESSION['username'];
} else {
    header('location: login.php');
}




$blog = new Blog($conn);
$data = $blog->getAllPost($username);


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
        <ul class="nav justify-content-end">
            <ul class="nav justify-content-end">

                <li class="nav-item" style="display: inline-block;">
                    <a class="nav-link" href="home.php">Home</a>
                </li>

            </ul>
    </nav>


    <div class="container-login">

        <p>Create a Post!</p>
        <form action="" method="post">

            <input type="text" name="title" id="" placeholder="Enter Title"> <br>
            <input type="text" name="content" id="" placeholder="Enter Content"> <br>
            <input type="submit" value="POST" class="btn btn-success">
        </form>


    </div>


    <a href="home.php">go back</a>


</body>

</html>