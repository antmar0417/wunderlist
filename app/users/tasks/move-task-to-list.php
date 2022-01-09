<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['task-id'], $_POST['move-task-to-list'])) {
    $id = trim($_POST['task-id']);
    $list_title = trim($_POST['move-task-to-list']);

    // $statement = $database->query("UPDATE tasks
    // SET list_title = '$list_title'
    // WHERE id = $id");
    // $statement->execute();

    $query = "UPDATE tasks
    SET list_title = :list_title
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':list_title', $list_title, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/index.php');
