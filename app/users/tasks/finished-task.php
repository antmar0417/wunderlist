<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['finished-task-id'])) {
    $user_id = $_SESSION['user']['id'];
    $id = $_GET['finished-task-id'];

    $statement = $database->query("UPDATE tasks
    SET checked = 'Yes'
    WHERE user_id = $user_id AND id = '$id'");
    $statement->execute();
}

header('Location: /');
