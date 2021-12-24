<?php if (isset($_SESSION['user'])) : ?>
    <img src="<?= checkIfAvatarExist(); ?>" alt="Avatar Photo" height="100px">
<?php endif; ?>
