<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
            </li>

            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>" href="/profile.php">My Profile</a>
                <?php else : ?>
                    <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>" href="/profile.php">Sign In</a>
                <?php endif; ?>
            </li>

            <li class="nav-item">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link" href="/app/users/logout.php">Logout</a>
                <?php else : ?>
                    <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>
