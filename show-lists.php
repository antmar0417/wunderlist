<div class="show-lists">
    <div class="lists-contents">
        <div class="close-show-list">+</div>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        Lists
                    </th>
                    <th>
                        <a href="index.php?show-all-tasks=all" id="">All Tasks</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="index.php?tasks-today=today" id="">Today</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lists as $list) : ?>
                    <tr>
                        <td>
                            <a href="index.php?show-tasks-within-list=<?php echo $list['title']; ?>" id=""><?php echo $list['title']; ?></a>

                        </td>
                        <td>
                            <a href="index.php?current-list-title=<?php echo $list['title']; ?>" class="btn btn-sm btn-primary" id="edit-button">
                                Edit
                            </a>
                            <a href="/app/users/lists/delete-list.php?list-title=<?php echo $list['title']; ?>" class="btn btn-sm btn-danger offset-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
