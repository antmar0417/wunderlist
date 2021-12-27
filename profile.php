<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <?php if (isset($_SESSION['user'])) : ?>
        <div class="row mt-5 justify-content-md-center">
            <div class="col-md-6 ml-center">
                <h1>My Profile</h1>
                <p>Customize your avatar.</p>
                <?php if (isset($_SESSION['user'])) : ?>
                    <img src="<?= checkIfAvatarExist(); ?>" alt="Avatar Photo" height="100px">
                <?php endif; ?>
                <form action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">

                        <label for="avatar">Change your avatar</label>
                        <input type="file" name="avatar" id="avatar" accept=".png, .jpg, jpeg" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                <h1>Change your email address</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email_address">email address:</label>
                        <input type="email" name="email_address" id="email_address">
                    </div>

                    <button type="submit" class="btn btn-primary">Change email</button>
                </form>

                <h1>Change your password</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="password">type a new password:</label>
                        <input name="password" id="password" type="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Change password</button>
                </form>
            </div>
        </div>
    <?php else : ?>
        <div class="row mt-5 justify-content-md-center">
            <div class="col-md-6 ml-center">
                <h1>Create an account</h1>
                <p>Fill in the form.</p>
                <form action="/app/users/register.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Your Name" required>
                        <small class="form-text">Please provide the your name.</small>
                    </div>

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

                    <button type="submit" class="btn btn-primary">Create Account</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
