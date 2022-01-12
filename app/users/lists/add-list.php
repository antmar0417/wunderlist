<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['list-title'], $_POST['id'])) {
    $user_id = trim($_POST['id']);
    $title = trim($_POST['list-title']);

    $query = 'INSERT INTO lists (title, user_id) VALUES (:title, :user_id)';

    $statement = $database->prepare($query);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/index.php');
