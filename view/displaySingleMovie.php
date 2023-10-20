<?php include(__DIR__ . '/includes/header.php'); ?>
<main class="text-center">
    <h2 class="title">
        <?= $arrayMovie['title'] ?>
    </h2>
    <section class="articles">
        <article class="article single">
            <div class="article__inner single">
                <div class="article__inner__header single">
                    <p>
                        Release year :
                        <?= $arrayMovie['release_year'] ?>
                    </p>
                    <p>
                        Producer :
                        <?= $arrayMovie['producer'] ?>
                    </p>
                    <p>
                        Production company :
                        <?= $arrayMovie['production_company'] ?>
                    </p>
                    <p class="btn tag">
                        Category :
                        <?= $arrayMovie['category'] ?>
                    </p>
                    <p>
                        Scenarist :
                        <?= $arrayMovie['scenarist'] ?>
                    </p>
                    <h3>
                        Synopsis
                    </h3>
                    <p>
                        <?= $arrayMovie['synopsis'] ?>
                    </p>
                </div>

                <?php if (isset($_SESSION['id']) && $_SESSION['id'] === $arrayMovie['author_id']): ?>
                    <a href="/movie/editMovie?movieId=<?= $arrayMovie['id'] ?>">Edit</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] === $arrayMovie['author_id']): ?>
                    <a class="btn btn--danger" href="/movie/deleteMovie?movieId=<?= $arrayMovie['id'] ?>&author_id=<?= $arrayMovie['author_id'] ?>">! Delete !</a>
                <?php endif; ?>
            </article>
        </section>
    </main>
    <?php include(__DIR__ . '/includes/footer.php'); ?>
</body></html>

