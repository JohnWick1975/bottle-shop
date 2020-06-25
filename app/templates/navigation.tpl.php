<header>
	<div class="wrapper">
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
            </ul>
            <ul>
                <?php if (App\App::$session->getUser()): ?>
                    <li><a href="/add.php">Add</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="/login.php">Login</a></li>
                    <li><a href="/register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
	</div>
</header>