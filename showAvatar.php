<?php if (isset($_SESSION['user'])) : ?>
    <img src="<?= checkIfImageExist(); ?>" alt="Avatar Photo" height="100px">
<?php endif; ?>
