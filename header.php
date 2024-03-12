<header>
    <nav>
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="data.php">Data</a></li>
                <li><a href="logout.php">Odhlásit se</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
