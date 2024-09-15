<?php $page = "Category Posts" ?>
<?php require_once('config.php'); ?>
<?php require_once('includes/public_functions.php'); ?>
<?php $topics = getAllTopics(); ?>
<?php $enter = getEnterInfo(); ?>
<?php require_once('includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVBAR ================================= -->
<header class="category__title">
    <h2>
        Entertainment
    </h2>
</header>
<!-- ================================= END TITLE ================================= -->
<?php include './includes/success_message.php'; ?>

<section class="posts">
    <div class="container posts__container">
        <?php foreach ($enter as $enter): ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?php echo 'static/images/' . $enter['image'] ?>">
                </div>

                <div class="post__info">
                    <h3 class="post__title">
                        <?php print_r($enter['nameentertainmenent']); ?>
                    </h3>

                    <div class="post__body">
                        <p>
                            "
                            <b>
                                <?php print_r($enter['nameentertainmenent']); ?>
                            </b>" is a
                            <i><?php print_r($enter['typeentertainement']); ?></i>
                            <?php if (($enter['typeentertainement']) == 'Movie'): ?>
                                directed by
                            <?php elseif (($enter['typeentertainement']) == 'Book'): ?>
                                written by
                            <?php else: ?>
                                directed by
                            <?php endif; ?>
                            <?php print_r($enter['author']); ?>.
                        </p>
                        <p>
                            It was created on
                            <?php print_r($enter['date']); ?>.
                        </p>
                        <p>
                        <?php if (($enter['typeentertainement']) == 'Movie'): ?>
                               The  <?php print_r($enter['typeentertainement']); ?> last <?php print_r($enter['duration']); ?>.
                            <?php elseif (($enter['typeentertainement']) == 'Book'): ?>
                               The <?php print_r($enter['typeentertainement']); ?> has <?php print_r($enter['nbpages']); ?> pages.
                            <?php else: ?>
                               The <?php print_r($enter['typeentertainement']); ?> last <?php print_r($enter['duration']); ?> (nb total of hours).
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="./thumbnail.php?thumbnail_name=<?php print_r($enter['nameentertainmenent']); ?>" class="btn">
                        Add/Update Thumbnail
                    </a>
                    <?php else: ?>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<!-- ================================= END CATEGORY BUTTONS ================================= -->
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->