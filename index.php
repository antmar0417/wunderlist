<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    // die(var_dump($avatar['name']));
    $destination = __DIR__ . '/uploads' . '/' . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $destination);
}
?>
<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>

    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>

        <?php if (file_exists(__DIR__ . '/uploads' . '/' . $avatar['name'])) : ?>
            <img src="/uploads/<?= $avatar['name'] ?>" alt="Avatar Photo" height="100px">
        <?php endif; ?>

        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="avatar">Please choose an image</label>
                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, jpeg" required>
            </div>

            <button type="submit">Upload</button>
        </form>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
