<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="main-section min-vh-100">
    <?php if (isLoggedIn()) : ?>
        <div class="row mt-4 justify-content-md-center">
            <div class="col-md-3 ml-center">
                <p class="text-center text-white">Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="index.php?list=all" class="btn btn-primary mb-3">Show Lists</a>
        </div>
        <div class="welcome"></div>

        <!-- Showing All Lists -->

        <?php if (isset($_GET['list'])) : ?>
            <?php require __DIR__ . '/app/users/lists/get-all-lists.php'; ?>
            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" />
                    <?php require __DIR__ . '/show-lists.php'; ?>
                    <a href="index.php?lists=show">Create New List</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Creating A List -->

        <?php if (isset($_GET['lists'])) : ?>
            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" />

                    <form action="/app/users/lists/add-list.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>" id="id" />

                        <label for="list-title" class="form-label"></label>
                        <input class="form-control mb-3" type="text" name="list-title" id="list-title" placeholder="List Title" required />
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <!-- Editing A List -->

        <?php if (isset($_GET['current-list-title'])) : ?>
            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <p class="text-center">Current name: <?php echo $_GET['current-list-title']; ?></p>

                    <form action="/app/users/lists/edit-list-name.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>" id="id" />
                        <input type="hidden" name="current-list-title" value="<?php echo $_GET['current-list-title']; ?>" id="current-list-title" />

                        <label for="new-list-title" class="form-label"></label>
                        <input class="form-control" type="text" name="new-list-title" id="new-list-title" placeholder="New List Name" required />
                        <button type="submit" class="btn btn-primary mt-3">Upload</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <!-- Showing All Tasks -->

        <?php if (isset($_GET['show-all-tasks'])) : ?>
            <?php require __DIR__ . '/app/users/tasks/get-all-tasks.php'; ?>

            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" />
                    <p>Showing <?php echo $_GET['show-all-tasks'] ?> tasks</p>
                    <!-- Tasks Table -->
                    <?php require __DIR__ . '/tasks-table.php'; ?>
                </div>
            </div>

        <?php endif; ?>

        <!-- Showing All Tasks Which Should Be Completed Today -->

        <?php if (isset($_GET['tasks-today'])) : ?>
            <?php require __DIR__ . '/app/users/tasks/get-all-task-today.php'; ?>

            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <?php
                    echo 'Today: ' . date('Y-m-d');
                    ?>
                    <!-- Tasks Table -->
                    <?php require __DIR__ . '/tasks-table.php'; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Showing Tasks Within A List-->

        <?php if (isset($_GET['show-tasks-within-list'])) : ?>
            <?php require __DIR__ . '/app/users/tasks/get-tasks-within-list.php'; ?>

            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <img src="<?= checkIfAvatarExist(); ?>" alt="avatar photo" />
                    <p>Current list: <?php echo $_GET['show-tasks-within-list']; ?> </p>
                    <?php require __DIR__ . '/tasks-table.php'; ?>
                    <a href="index.php?current-list=<?php echo $_GET['show-tasks-within-list']; ?>" id="">Create New Task</a>
                </div>
            </div>

        <?php endif; ?>

        <!-- Editing a task -->

        <?php if (isset($_GET['task-id'])) : ?>
            <?php require __DIR__ . '/app/users/lists/get-all-list-suggestions.php'; ?>
            <?php $tasks = getAllTasks($database, $_SESSION['user']['id']); ?>

            <?php foreach ($tasks as $task) : ?>
                <?php if ($task['id'] === $_GET['task-id']) : ?>
                    <?php $taskTitlePlaceholder = $task['title']; ?>
                    <?php $taskContentPlaceholder = $task['content']; ?>
                    <?php $listTitlePlaceholder = $task['list_title']; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <p>Current list: <?php echo $listTitlePlaceholder; ?></p>

                    <!-- Updating The Date -->

                    <form action="/app/users/tasks/edit-task-date.php" method="post">
                        <input type="hidden" name="task-id" value="<?php echo $_GET['task-id']; ?>" id="task-id" />

                        <div class="input-group mb-3">
                            <label for="date" class="form-label"></label>
                            <input placeholder="Selected date" type="date" name="date" id="date" class="form-control datepicker" required />

                            <button class="btn btn-primary" type="submit">Change</button>
                        </div>
                    </form>

                    <!-- New Title And Content -->

                    <form action="/app/users/tasks/edit-task-content.php" method="post">
                        <input type="hidden" name="task-id" value="<?php echo $_GET['task-id']; ?>" id="task-id" />

                        <label for="task-title" class="form-label"></label>
                        <input class="form-control" type="text" name="task-title" id="task-title" placeholder="<?php echo $taskTitlePlaceholder; ?>" required />

                        <label for="quote" class="form-label"></label>
                        <textarea name="quote" id="quote" class="form-control mb-3" placeholder="<?php echo $taskContentPlaceholder; ?>" required></textarea>

                        <button type="submit" class="btn btn-sm btn-primary mb-4">Change</button>
                    </form>

                    <!-- Moving task to a list -->

                    <form action="/app/users/tasks/move-task-to-list.php" method="post">
                        <input type="hidden" name="task-id" value="<?php echo $_GET['task-id']; ?>" id="task-id" />

                        <div class="input-group mb-3">
                            <label for="move-task-to-list" class="form-label"></label>
                            <select class="form-select" name="move-task-to-list" id="move-task-to-list">
                                <option selected>Celect a list</option>
                                <?php foreach ($lists as $list) : ?>
                                    <option><?php echo $list['title']; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <button class="btn btn-primary" type="submit">Change</button>
                        </div>
                    </form>
                    <?php foreach ($tasks as $task) : ?>
                        <?php if ($task['checked'] === 'No' && $task['id'] === $_GET['task-id']) : ?>
                            <a href="/app/users/tasks/finished-task.php?finished-task-id=<?php echo $_GET['task-id']; ?>" class="btn btn-sm btn-success" id="edit-button">
                                Completed
                            </a>
                        <?php endif; ?>
                        <?php if ($task['checked'] === 'Yes' && $task['id'] === $_GET['task-id']) : ?>
                            <a href="/app/users/tasks/unfinished-task.php?unfinished-task-id=<?php echo $_GET['task-id']; ?>" class="btn btn-sm btn-danger">Unfinished</a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Creating New Task -->

        <?php if (isset($_GET['current-list'])) : ?>
            <div class="show-lists">
                <div class="lists-contents">
                    <div class="close-show-list">+</div>
                    <p>Current List: <?php echo $_GET['current-list']; ?></p>

                    <form action="/app/users/tasks/create-task.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>" id="id" />
                        <input type="hidden" name="current-list" value="<?php echo $_GET['current-list']; ?>" id="current-list" />

                        <label for="date" class="form-label"></label>
                        <input placeholder="Selected date" type="date" name="date" id="date" class="form-control datepicker" required />

                        <label for="task-title" class="form-label"></label>
                        <input class="form-control" type="text" name="task-title" id="task-title" placeholder="Task Title" required />

                        <label for="quote" class="form-label">Quote</label>
                        <textarea name="quote" id="quote" class="form-control" required></textarea>
                        <br />

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        <script src="/assets/scripts/add-list.js"></script>
    <?php else : ?>
        <div class="show-todo-section">
            <p class="text-center">Login or sign in to create a list</p>
            <div class="todo-item">
                <div class="empty">
                    <img src="./images/to-do-list.jpeg" width="100%" />
                    <img src="./images/writing-hand.gif" width="50px">
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
