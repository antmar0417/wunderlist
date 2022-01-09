<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['id'], $_POST['task-id'], $_POST['move-task-to-list'])) {
    $id = trim($_POST['task-id']);
    // $user_id = trim($_POST['id']);
    $list_title = trim($_POST['move-task-to-list']);

    $query = "UPDATE tasks
    SET list_title = :list_title
    WHERE id = :id AND list_title = '$list_title'";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    // $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_title', $list_title, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/index.php');
