<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['task-id'], $_POST['task-title'], $_POST['quote'])) {
    $id = trim($_POST['task-id']);
    $title = trim($_POST['task-title']);
    $content = trim($_POST['quote']);

    $query = "UPDATE tasks
    SET
    title = :title,
    content = :content
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/index.php');
