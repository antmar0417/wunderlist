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
                    <button class="btn btn-sm btn-primary" id="edit-button">
                        Edit
                    </button>
                    <a class="btn btn-sm btn-danger" href="">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
