<?php

declare(strict_types=1);

if (isset($_GET['show-all-tasks'])) {
    $id = $_SESSION['user']['id'];

    $statement = $database->query("SELECT content
    FROM tasks
    WHERE user_id = $id");

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
}
