<?php

include "db_con.php";
include 'functions.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $user = $conn->query("SELECT * FROM users WHERE user_id = $id LIMIT 1")
        ->fetch_array();
} else {
    header('Location: /index.php?status=You have to select a user first');
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE users SET `name` = '$name', `email` = '$email' WHERE user_id = $id";
    $result = $conn->query($sql);
}

if($result) {
    header("Location: index.php?status=The user has been updated");
} else {
    echo "Failed" . $mysqli->error;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script></head>
<body>

<nav class="navbar bg-dark text-light justify-content-center fs-2">
    Victor's CRUD App
</nav>
<div class="container">
    <div class="text-center fs-5 mt-2 text-muted">
        Create , Read , Update, Delete
    </div>
</div>

<div class="container">
    <div class="text-center fs-3 mt-5">
        Update the user <b><?= $user['name'];  ?></b>
    </div>

    <div class="container justify-content-center mt-3 d-flex bg-light p-5">
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <label class="form-label">Name</label>
                    <input type="text"
                           class="form-control"
                           value="<?= $user['name']; ?>"
                           name="name"
                           placeholder="e.g Victor">
                </div>
                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="email"
                           value="<?= $user['email']; ?>"
                           class="form-control"
                           name="email"
                           placeholder="e.g victor@mail.com">
                </div>
                <div class="col">
                    <label class="form-label">Password</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success mt-5">
                Update
            </button>
            <a href="/index.php" class="btn btn-danger mt-5">
                Cancel
            </a>
        </form>
    </div>
</div>

</body>
</html>