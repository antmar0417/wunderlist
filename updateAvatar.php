<?php if (file_exists(__DIR__ . '/uploads' . '/' . $avatarName)) : ?>
    <img src="/uploads/<?= $avatarName ?>" alt="Avatar Photo" height="100px">
<?php else : ?>
    <img src="/uploads/unknown-avatar.jpeg" alt="Avatar Photo" height="100px">
<?php endif; ?>
