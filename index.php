<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="row mt-4 justify-content-md-center">
    <div class="col-md-3 ml-center">
        <h1 class="text-center"><?php echo $config['title']; ?></h1>
    </div>
</div>

<?php if (isLoggedIn()) : ?>
    <div class="col-md-3 ml-center">
        <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
        <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" height="100px">
    </div>
<?php else : ?>
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-3 ml-center">
            <p class="text-center">Login or Sign in to create tasks</p>
        </div>
    </div>
    <div class="row mt-0 justify-content-md-center">
        <img src="./images/to-do-list.jpeg" alt="to-do list photo">
    </div>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
