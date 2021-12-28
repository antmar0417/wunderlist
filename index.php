<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="row mt-4 justify-content-md-center">
    <div class="col-md-3 ml-center">
        <h1><?php echo $config['title']; ?></h1>
        <?php if (isLoggedIn()) : ?>
            <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
            <img src="<?= checkIfAvatarExist(); ?>" alt="Avatar Photo" height="100px">
        <?php else : ?>
            <p>Login or Sign in to create tasks</p>
        <?php endif; ?>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
