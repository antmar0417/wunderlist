<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['unfinished-task-id'])) {
    $user_id = $_SESSION['user']['id'];
    $id = $_GET['unfinished-task-id'];

    $statement = $database->query("UPDATE tasks
    SET checked = 'No'
    WHERE user_id = $user_id AND id = '$id'");
    $statement->execute();
}

header('Location: /');
