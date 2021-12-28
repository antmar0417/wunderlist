<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// $errors = [];


// Check if both email and password exists in the POST request.
if (isset($_POST['email'], $_POST['password'])) {
    // $email = trim($_POST['email']);
    // test
    // $password = trim($_POST['password']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Prepare, bind email parameter and execute the database query.
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    // if (!$user) {
    //     redirect('/login.php');
    // }
    // Check if the email adress is valid
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors[] = 'The email address is not a valid email address!';
    // }

    // if ($email !== $user['email'] || $password !== $user['password']) {
    //     $errors[] = 'Whoops... The provided credentials does not match our records!';
    // }

    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    if ($email === $user['email'] && password_verify($_POST['password'], $user['password'])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
        unset($user['password']);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'image' => $user['image'],
        ];
        redirect('/index.php');
    } else {
        redirect('/login.php');
    }
}

// We should put this redirect in the end of this file since we always want to
// redirect the user back from this file. We don't know
// redirect('/');
