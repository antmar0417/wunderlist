<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['list-title'])) {
    $user_id = $_SESSION['user']['id'];
    $title = trim($_GET['list-title']);

    $statement = $database->query("DELETE FROM lists
    WHERE user_id = $user_id AND title = '$title'");
    $statement->execute();

    $statement = $database->query("DELETE FROM tasks
    WHERE user_id = $user_id AND list_title = '$title'");
    $statement->execute();
}

header('Location: /');
