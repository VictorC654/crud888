<?php
include 'db_con.php';
include 'functions.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $user = $conn->query("SELECT * FROM users WHERE user_id = $id LIMIT 1")
        ->fetch_array();
} else {
    header('Location: /index.php?status=You have to select a user first');
}

if(isset($_POST['delete']))
{
    $result = $conn->query("DELETE FROM users WHERE user_id = $id");
}

if($result)
{
    header('Location: /index.php?status=User deleted succesfully');
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
    <div class="text-center fs-3 mt-5 text-danger">
        Are you sure you want to delete this user?
    </div>
    <p class="text-muted text-center mt-3">Deleting is permanent and cannot be undone.</p>
    <div class="container justify-content-center mt-3 d-flex align-items-start flex-column bg-light p-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th><?= $id; ?></th>
                <th><?= $user['name']; ?></th>
                <th><?= $user['email']; ?></th>
            </tr>
            </tbody>
        </table>
        <div class="d-flex align-items-start">
            <a href="index.php" class="btn btn-danger m-2">
                Cancel
            </a>
            <form action="" method="POST">
                <button class="btn btn-success m-2" type="submit" name="delete">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>