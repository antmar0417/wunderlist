<?php

$errors = [];
$quotes = [
    ['name' => '', 'quote' => ''],
];

if (isset($_POST['name'], $_POST['quote'])) {
    $name = trim($_POST['name']);
    $quote = trim($_POST['quote']);

    if ($name === '') {
        $errors[] = 'You need to fill a name';
    }
    if ($quote === '') {
        $errors[] = 'Please add content into the field';
    }
    if (count($errors) === 0) {
        $quotes[] = [
            'name' => $name,
            'quote' => $quote
        ];
    }
}
