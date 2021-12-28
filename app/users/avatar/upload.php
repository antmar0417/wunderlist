<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

$avatarName = '';

if (isset($_FILES['avatar'], $_POST['id'])) {
    $avatar = $_FILES['avatar'];

    // Adding the user id and date into the image name
    $avatarName = $_SESSION['user']['id'] . '-' . date('ymd') . '-' . $avatar['name'];
    $destination = __DIR__ . '/../../../uploads' . '/' . $avatarName;
    move_uploaded_file($avatar['tmp_name'], $destination);

    // Updating the image src into database
    $id = trim($_POST['id']);
    $query = "UPDATE users
    SET image = :image
    WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':image', $avatarName, PDO::PARAM_STR);
    $statement->execute();

    // Updating session variables without re-login
    $email = $_SESSION['user']['email'];
    if (($query)) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['image'] = $avatarName;
        $_SESSION['user']['id'] = $_POST['id'];
    }
}

redirect('/profile.php');
