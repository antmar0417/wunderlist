<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="row mt-4 justify-content-md-center">
    <div class="col-md-3 ml-center">
        <h1><?php echo $config['title']; ?></h1>
        <p>This is the home page.</p>
        <?php if (isset($_SESSION['user'])) : ?>
            <img src="<?= checkIfAvatarExist(); ?>" alt="Avatar Photo" height="100px">
        <?php endif; ?>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
