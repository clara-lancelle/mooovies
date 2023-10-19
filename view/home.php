<?php include(__DIR__ . '/includes/header.php'); ?>
<main class="text-center home">
    <div class="home__body">
        <?php echo (isset($username)) ? '<a class="btn" href="/user/login">Login</a>' : 'Hello' . $username; ?>
    </div>
</main>
<?php include(__DIR__ . '/includes/footer.php'); ?></body></html>

