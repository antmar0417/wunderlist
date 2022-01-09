<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['task-id'], $_POST['date'])) {
    $id = trim($_POST['task-id']);
    $deadline_date = $_POST['date'];

    $query = "UPDATE tasks
    SET deadline_date = :deadline_date
    WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindParam(':deadline_date', $deadline_date, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/index.php');
