<?php if (isset($_SESSION['user'])) : ?>
    <p><?php echo $_SESSION['user']['name']; ?>, here is your new avatar</p>
    <?php if (file_exists(__DIR__ . '/uploads' . '/' . $avatarName)) : ?>
        <img src="/uploads/<?= $avatarName ?>" alt="Avatar Photo" height="100px">
    <?php else : ?>
        <img src="/uploads/unknown-avatar.jpeg" alt="Avatar Photo" height="100px">
    <?php endif; ?>
<?php endif; ?>
