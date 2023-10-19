<?php include(__DIR__ . '/includes/header.php'); ?>
<main class="text-center">
    <h2 class="title">All our mooovies !</h2>
    <section class="articles">
        <?php foreach ($arrayMovies as $movie) { ?>
                <article class="article">
                    <div class="article__inner">
                        <div class="article__inner__img" style="background-image: url(../assets/img/<?= $article['image'] ?>);"></div>
                        <div class="article__inner__header">
                            <h3>
                                <?= $movie['title'] ?>
                            </h3>
                            <h4>
                                Producer :
                                <?= $movie['producer'] ?>
                            </h4>
                            <h5>
                                Synopsis
                            </h5>
                            <p>
                                <?= $movie['synopsis'] ?>
                            </p>
                            <p>
                                <?= $movie['category'] ?>
                            </p>
                        </div>
                    </div>
                    <a class="singleArticleBtn" method="GET" href="/movie/displaySingleMovie?movieId=<?= $movie['id'] ?>">
                        See more ->
                    </a>
                </article>
        <?php } ?>
    </section>
</main>
<?php include(__DIR__ . '/includes/footer.php'); ?></body></html>

