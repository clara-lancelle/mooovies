<body class="bg small">
    <?php include(__DIR__ . '/includes/header.php'); ?>
    <main class="form">
        <section>
            <div class="banner"></div>
            <h1>Registration</h1>
            <h2>Already registered ?
                <a href="/user/login" title="link to login">Login here</a>
            </h2>
        </section>

        <form action="" method="POST" name="registration">
            <fieldset class="floating">
                <input type="text" class="floating-input <?php !isset($formErrors['login']) ?: 'invalid' ?>" id="username" name="username" value="<?= @$_POST['username'] ?>">
                <p class="error" <?php echo isset($formErrors['login']) ? $formErrors['login'] : 'hidden' ?>></p>
                <label for="username" class="floating-label">Username</label>
            </fieldset>
            <fieldset class="floating">
                <input type="password" class="floating-input" id="password" name="password">
                <p class="error" <?= isset($formErrors['login']) ?: 'hidden' ?>>
                    <?= @$formErrors['login']; ?>
                </p>
                <label for="password" class="floating-label">Password</label>
            </fieldset>
            <fieldset class="floating">
                <input type="password" class="floating-input" id="confirmPassword" name="confirmPassword">
                <p class="error" <?= isset($formErrors['login']) ?: 'hidden' ?>>
                    <?= @$formErrors['login']; ?>
                </p>
                <label for="password" class="floating-label">Confirm password</label>
            </fieldset>
            <button type="submit" name="loginUser" class="addBtn">Register</button>
        </form>
    </main>
    <?php include(__DIR__ . '/includes/footer.php'); ?>
</body></html>

