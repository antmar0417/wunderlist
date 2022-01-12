<?php

declare(strict_types=1);

if (isset($_GET['tasks-today'])) {
    $id = $_SESSION['user']['id'];
    $date = date('Y-m-d');

    $statement = $database->query("SELECT *
    FROM tasks
    WHERE user_id = $id AND deadline_date = '$date'");

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
}
