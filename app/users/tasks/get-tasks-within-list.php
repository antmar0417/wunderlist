<?php

declare(strict_types=1);

if (isset($_GET['show-tasks-within-list'])) {
    $id = $_SESSION['user']['id'];
    $title = $_GET['show-tasks-within-list'];

    $statement = $database->query("SELECT *
    FROM tasks
    WHERE user_id = $id AND list_title = '$title'");

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
}
