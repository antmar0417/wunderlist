<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.
if (isset($_POST['email'], $_POST['password'], $_POST['name'])) {
    // $name = trim($_POST['name']);
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $statement = $database->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/');
