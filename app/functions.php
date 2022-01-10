<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function checkIfAvatarExist()
{
    if (file_exists(__DIR__ . '/../uploads' . '/' . $_SESSION['user']['image'])) {
        $imagePath = "/uploads" . "/" .  $_SESSION['user']['image'];
        return $imagePath;
    } else {
        $imagePath = '/uploads/unknown-avatar.jpeg';
        return $imagePath;
    }
}

function isLoggedIn(): bool
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        return true;
    } else {
        return false;
    }
}

function getAllTasks(PDO $database, int $id): array
{
    $statement = $database->query("SELECT *
        FROM tasks
        WHERE user_id = $id");

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}
