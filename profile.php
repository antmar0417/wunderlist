<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $avatarName = $_SESSION['user']['id'] . '-' . date('ymd') . '-' . $avatar['name'];
    $destination = __DIR__ . '/uploads' . '/' . $avatarName;
    move_uploaded_file($avatar['tmp_name'], $destination);

    $id = $_SESSION['user']['id'];
    $query = sprintf("UPDATE users
    SET image = '$avatarName'
    WHERE id = '$id'", $avatarName);
    $statement = $database->query($query);
}
?>

<article>
    <?php if (isset($_SESSION['user'])) : ?>
        <h1>My Profile</h1>
        <p>Customize your avatar.</p>
        <?php require __DIR__ . '/showAvatar.php'; ?>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="avatar">Please choose an image</label>
                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, jpeg" required>
            </div>

            <button type="submit">Upload</button>
        </form>
    <?php else : ?>
        <h1>Create an account</h1>
        <p>fill in your details in the form.</p>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
