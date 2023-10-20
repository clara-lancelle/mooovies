<?php include(__DIR__ . '/includes/header.php'); ?>
<main class="form">
    <h2>Add Movie</h2>
    <form action="" method="POST" class="form--center">
        <fieldset class="floating">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>">
            <?php if (isset($formErrors['title'])): ?>
                <p class="error"><?= $formErrors['title'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <label for="producer">Producer:</label>
            <input type="text" id="producer" name="producer" required value="<?= isset($_POST['producer']) ? htmlspecialchars($_POST['producer']) : ''; ?>">
            <?php if (isset($formErrors['producer'])): ?>
                <p class="error"><?= $formErrors['producer'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <label for="synopsis">Synopsis:</label>
            <textarea id="synopsis" name="synopsis" rows="4" required><?= isset($_POST['synopsis']) ? htmlspecialchars($_POST['synopsis']) : ''; ?></textarea>
            <?php if (isset($formErrors['synopsis'])): ?>
                <p class="error"><?= $formErrors['synopsis'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <select name="category_id" id="category_id">
                <option value=""></option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?php if (isset($_POST['category_id'])) {
                          echo ($_POST['category_id'] == $category['id']) ? 'selected' : '';
                      } ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="category_id">Category:</label>
            <?php if (isset($formErrors['category_id'])): ?>
                <p class="error"><?= $formErrors['category_id'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <label for="scenarist">Scenarist:</label>
            <input type="text" id="scenarist" name="scenarist" required value="<?= isset($_POST['scenarist']) ? htmlspecialchars($_POST['scenarist']) : ''; ?>">
            <?php if (isset($formErrors['scenarist'])): ?>
                <p class="error"><?= $formErrors['scenarist'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <label for="production_company">Production Company:</label>
            <input type="text" id="production_company" name="production_company" required value="<?= isset($_POST['production_company']) ? htmlspecialchars($_POST['production_company']) : ''; ?>">
            <?php if (isset($formErrors['production_company'])): ?>
                <p class="error"><?= $formErrors['production_company'] ?></p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="floating">
            <label for="release_year">Release Year:</label>
            <input type="text" id="release_year" name="release_year" required value="<?= isset($_POST['release_year']) ? htmlspecialchars($_POST['release_year']) : ''; ?>">
            <?php if (isset($formErrors['release_year'])): ?>
                <p class="error"><?= $formErrors['release_year'] ?></p>
            <?php endif; ?>
        </fieldset>

        <?php if (isset($formErrors['movieAlreadyExist'])): ?>
            <p class="error"><?= $formErrors['movieAlreadyExist'] ?></p>
        <?php endif; ?>
        <input type="submit" value="Add Movie" class="addBtn">
    </form>


</main>
<?php include(__DIR__ . '/includes/footer.php'); ?></body></html>

