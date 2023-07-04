<?php
include 'db_con.php';
include 'functions.php';

$data = $conn->query("SELECT * FROM users");

while ($user = $data->fetch_assoc())
{
    $users[] = $user;
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
        All Users
    </div>
    <p class="text-muted text-center mt-3">User management page. </p>
    <?php
        if(isset($_GET['status']))
        {
            $status = $_GET['status'];
            echo '<div class="alert alert-warning" role="alert">
                  '.$status.'.
                  </div>';
        }
    ?>
    <div class="container justify-content-center mt-3 d-flex bg-light p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) : ?>
            <tr>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="/update.php?id=<?= $user['user_id']; ?>" class="btn btn-primary">Update</a>
                    <a href="/delete.php?id=<?= $user['user_id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td><a href="/add_user.php" class="btn btn-success">+ Add user</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>