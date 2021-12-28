<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


// Check if both email and id exists in the POST request.
if (isset($_POST['email'], $_POST['id'])) {
    $email = trim($_POST['email']);
    $id = trim($_POST['id']);
    // die(var_dump($email));
    // die(var_dump($id));

    $query = "UPDATE users
    SET email = :email
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $avatarName, PDO::PARAM_STR);
    $statement->execute();
}

redirect('/profile.php');
