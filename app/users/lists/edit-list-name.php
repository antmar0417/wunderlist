<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['current-list-title'], $_POST['id'], $_POST['new-list-title'])) {
    $user_id = trim($_POST['id']);
    $title = trim($_POST['current-list-title']);
    $new_title = trim($_POST['new-list-title']);

    $query = "UPDATE lists
    SET title = :title
    WHERE user_id = :user_id AND title = '$title'";

    $statement = $database->prepare($query);
    $statement->bindParam(':title', $new_title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();

    $query = "UPDATE tasks
    SET list_title = :list_title
    WHERE user_id = :user_id AND list_title = '$title'";

    $statement = $database->prepare($query);
    $statement->bindParam(':list_title', $new_title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/index.php');
