<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="row mt-4 justify-content-md-center">
    <div class="col-md-3 ml-center">
        <h1 class="text-center"><?php echo $config['title']; ?></h1>
    </div>
</div>

<?php if (isLoggedIn()) : ?>
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-3 ml-center">
            <p class="text-center">Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" height="100px">
    </div>
    <div class="d-flex justify-content-center">
        <details class="navbar-brand">
            <summary>
                Lists
            </summary>
            <ul class="list-group list-group-flush">
                <a href="index.php?list=all" class="list-group-item list-group-item-action">All</a>
                <a href="#" class="list-group-item list-group-item-action">Ongoing</a>
                <a href="#" class="list-group-item list-group-item-action">Done</a>
            </ul>
        </details>
    </div>
    <?php if (isset($_GET['list'])) : ?>
        <p class="text-center">Current list, <?php echo $_GET['list']; ?></p>
        <?php require __DIR__ . '/lists.php'; ?>
    <?php endif; ?>
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
