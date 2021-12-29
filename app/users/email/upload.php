<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


// Check if both email and id exists in the POST request.
if (isset($_POST['email'], $_POST['id'])) {
    // $email = trim($_POST['email']);
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $id = trim($_POST['id']);
    // die(var_dump($email));
    // die(var_dump($id));

    $query = "UPDATE users
    SET email = :email
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Updating session variables without re-login
    $avatarName = $_SESSION['user']['image'];
    $name = $_SESSION['user']['name'];
    if (($query)) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
        $_SESSION['user']['image'] = $avatarName;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['id'] = $_POST['id'];
        $_SESSION['user']['name'] = $name;
    }
}

redirect('/profile.php');
