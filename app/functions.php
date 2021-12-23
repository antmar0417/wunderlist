<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function checkIfImageExist()
{
    if (isset($_SESSION['user'])) {
        if (file_exists(__DIR__ . '/../uploads' . '/' . $_SESSION['user']['image'])) {
            $imagePath = "/uploads" . "/" .  $_SESSION['user']['image'];
            echo $imagePath;
        } else {
            $imagePath = '/uploads/unknown-avatar.jpeg';
            echo $imagePath;
            // echo file_exists(__DIR__ . '/../uploads' . '/' . $_SESSION['user']['image']);
        }
    }
    // $imagePath = "/uploads/" .  $_SESSION['user']['image'];
    // echo $imagePath;
}

checkIfImageExist();
