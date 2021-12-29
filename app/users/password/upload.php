<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


// Check if both password and id exists in the POST request.
if (isset($_POST['password'], $_POST['id'])) {
    // $password = trim($_POST['password']);
    $password = $_POST['password'];
    $id = trim($_POST['id']);

    $query = "UPDATE users
    SET password = :password
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();
}

redirect('/profile.php');
