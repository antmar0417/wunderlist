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

    <!-- Adding New List -->
    <div class="change-list">
        <div>
            <h2>Click on the button to create list</h2>
            <!-- <a href="#" id="open-button" class="button">Add List</a> -->
            <button id="open-button" class="button">Add List</button>
        </div>

        <div class="pop-up-add-list">
            <div class="pop-up-contents">
                <div class="close-add-list">+</div>
                <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" />

                <form action="/app/users/lists/add-list.php" method="post">
                    <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>" id="id" />

                    <label for="list-title" class="form-label"></label>
                    <input class="form-control" type="text" name="list-title" id="list-title" placeholder="List Title" required />
                    <!-- <a href="index.php" class="button">Submit</a> -->
                    <button type="submit" class="button">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- Showing The Lists -->
    <div class="change-list-name">
        <div>
            <h2>Click on the button to see yor lists</h2>
            <a href="index.php?list=all" id="show-lists-button" class="show-lists-button">Show Lists</a>
        </div>
    </div>
    <?php if (isset($_GET['list'])) : ?>
        <?php require __DIR__ . '/app/users/lists/get-all-lists.php'; ?>
        <div class="show-lists">
            <div class="lists-contents">
                <div class="close-show-list">+</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Lists
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lists as $list) : ?>
                            <tr>
                                <td>
                                    <?php echo $list['title']; ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" id="edit-button">
                                        Edit
                                    </button>
                                    <a class="btn btn-sm btn-danger offset-1" href="/app/users/lists/delete-list.php?list-title=<?php echo $list['title']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <!-- END -->

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
