<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['id'])) {
    $user_id = $_SESSION['user']['id'];
    $id = $_GET['id'];

    $statement = $database->query("DELETE FROM tasks
    WHERE user_id = $user_id AND id = '$id'");
    $statement->execute();
}

header('Location: /');
