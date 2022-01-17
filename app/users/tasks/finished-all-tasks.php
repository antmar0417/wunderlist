<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_GET['current-list'])) {
    $user_id = $_SESSION['user']['id'];
    $list_title = $_GET['current-list'];

    $statement = $database->query("UPDATE tasks SET checked = 'Yes' WHERE user_id = :user_id AND list_title = :list_title;");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_title', $list_title, PDO::PARAM_STR);
    $statement->execute();
}

header('Location: /');
