<table class="table">
    <thead>
        <tr>
            <th>Deadline</th>
            <th>Completed</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?php echo $task['deadline_date']; ?></td>

                <td>
                    <?php echo $task['checked']; ?>
                </td>
                <td>
                    <?php echo $task['title']; ?>
                </td>

                <td>
                    <?php echo $task['content']; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="index.php?task-id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary offset-1">Edit</a>

                    <!-- <button class="btn btn-sm btn-primary" id="edit-button">
                        Edit
                    </button> -->
                    <a href="/app/users/tasks/delete-task.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger offset-1">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
