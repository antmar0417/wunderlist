<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
    <?php if (isset($_FILES['avatar'])) : ?>
        <?php require __DIR__ . '/updateAvatar.php'; ?>
    <?php else : ?>
        <?php require __DIR__ . '/showAvatar.php'; ?>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
