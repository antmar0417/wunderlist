<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
    <?php if (file_exists(__DIR__ . '/uploads' . '/' . $_SESSION['user']['image'])) : ?>
        <img src="/uploads/<?= $_SESSION['user']['image'] ?>" alt="Avatar Photo" height="100px">
    <?php else : ?>
        <img src="/uploads/unknown-avatar.jpeg" alt="Avatar Photo" height="100px">
    <?php endif; ?>
<?php endif; ?>
