<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="row mt-5 justify-content-md-center">
    <div class="col-md-6 ml-center">
        <h1>Login</h1>
        <?php if ($_SESSION['message'] !== '') : ?>
            <p><?php echo $_SESSION['message']; ?></p>
        <?php endif; ?>

        <form action="app/users/login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="your@email.com" required>
                <small class="form-text">Please provide the your email address.</small>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
                <small class="form-text">Please provide the your password (passphrase).</small>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>


<?php require __DIR__ . '/views/footer.php'; ?>
