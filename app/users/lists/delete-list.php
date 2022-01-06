<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['list-title'])) {
    $user_id = $_SESSION['user']['id'];
    $title = $_GET['list-title'];

    $statement = $database->query("DELETE FROM lists
    WHERE user_id = $user_id AND title = '$title'");
}

header('Location: /');
