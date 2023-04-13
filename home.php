<?php
require 'blog.php';
session_start();
$username = $_SESSION['username'];
$blog = new Blog($conn);
$data = $blog->getAllPost($username);

if (isset($_GET['delete_id'])) {
    $postId = $_GET['delete_id'];
    $blog->deletePost($postId);
}

if (isset($_SESSION['username'])) {
    $_SESSION['username'];
} else {
    header('location: login.php');
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
        <ul class="nav justify-content-end">
            <ul class="nav justify-content-end">
                <li class="nav-item" style="display: inline-block;">
                    <a class="nav-link" href="#">Hi
                        <?php echo $_SESSION['username'] ?>
                    </a>
                </li>
                <li class="nav-item" style="display: inline-block;">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item" style="display: inline-block;">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
    </nav>



    <div class="container">
        <?php if ($data) { ?>
            <?php foreach ($data as $row) { ?>
                <div class="container-card">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        <p>
                            <?php echo $row['title'] ?>
                        </p>
                        <ul>
                            <li>
                                <?php echo $row['content'] ?>
                            </li>
                            <li>
                                Date: <?php echo $row['created_date'] ?>
                            </li>
                        </ul>
                        <hr>

                        <button class="btn btn-danger"><a href="?delete_id=<?php echo $row['id'] ?>">DELETE</a></button>
                        <button class="btn btn-success"><a href="update.php?id=<?php echo $row['id'] ?>">EDIT</a></button>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p> No data found!</p>
        <?php } ?>
    </div>




    <div class="container">
        <div class="container-card">
            <div class="shadow-sm p-3 mb-5 bg-white rounded">
                <button class="btn btn-primary"><a href="create.php">CREATE NEW POST</a></button>
            </div>
        </div>

    </div>

</body>



</html>