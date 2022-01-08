<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['current-list'], $_POST['id'], $_POST['date'], $_POST['task-title'], $_POST['quote'])) {
    $title = $_POST['task-title'];
    $content = $_POST['quote'];
    $deadline_date = $_POST['date'];
    $user_id = trim($_POST['id']);
    $list_title = $_POST['current-list'];

    $query = 'INSERT INTO tasks (title, content, deadline_date, user_id, list_title) VALUES (:title, :content, :deadline_date, :user_id, :list_title)';

    $statement = $database->prepare($query);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':deadline_date', $deadline_date, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_title', $list_title, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/index.php');
