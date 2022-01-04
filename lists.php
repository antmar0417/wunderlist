<?php

if (isset($_GET['list']))
    $id = $_SESSION['user']['id'];
$statement = $database->query("SELECT DISTINCT title
    FROM lists
    INNER JOIN users
    ON users.id = lists.user_id
    WHERE lists.user_id = $id
    ORDER BY lists.title DESC");

$lists = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Your lists</h2>
<?php foreach ($lists as $list) : ?>
    <p><?php echo $list['title']; ?></p>
<?php endforeach; ?>
