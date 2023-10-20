<?php include(__DIR__ . '/includes/header.php'); ?>
<main class="text-center home">
    <div class="home__body">
        <?php if (!isset($_SESSION['user'])): ?>
            <a class="btn btn--wine btn--rounded" href="/user/login">Login</a>'
    <?php else: ?>
            <h2>
                Hello
                <?= $_SESSION['user'] ?>
            </h2>
        <?php endif; ?>
    </div>
</main>
<?php include(__DIR__ . '/includes/footer.php'); ?></body></html>

