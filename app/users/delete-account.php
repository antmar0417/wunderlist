<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-account'], $_POST['id'])) {
    $userId = $_POST['id'];
    $userEmail = trim($_POST['delete-account']);


    if ($userEmail === $_SESSION['user']['email']) {

        $statement = $database->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindParam(':id', $userId, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM lists WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();

        unset($_SESSION['user']);
        session_destroy();

        redirect('/');
    }

    redirect('/profile.php');
}
