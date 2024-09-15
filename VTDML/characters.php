<?php $page = "Category Posts" ?>
<?php require_once('config.php'); ?>
<?php require_once('includes/public_functions.php'); ?>
<?php $topics = getAllTopics(); ?>
<?php $char = getCharInfo(); ?>
<?php require_once('includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVBAR ================================= -->
<header class="category__title">
    <h2>
        Characters
    </h2>
</header>
<!-- ================================= END TITLE ================================= -->
<?php include './includes/success_message.php'; ?>

<section class="posts">
    <div class="container posts__container">
        <?php foreach ($char as $char): ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?php echo 'static/images/' . $char['image'] ?>">
                </div>

                <div class="post__info">
                    <h3 class="post__title">
                        <?php print_r($char['char_namechar']); ?>
                    </h3>

                    <div class="post__body">
                        <p>
                            <b>
                                <?php print_r($char['char_namechar']); ?>
                            </b> is a
                            <?php print_r($char['age']); ?> year old
                            <?php if (($char['franchise']) == 'Monster High'): ?>
                                Ghoul,
                            <?php else: ?>
                                Descendants,
                            <?php endif; ?>
                            born
                            <?php if ($char['birthday'] == 'Unknown'): ?>
                                at an unknown date.
                            <?php else: ?>
                                on
                                <?php print_r($char['birthday']); ?>.
                            <?php endif; ?>
                        </p>
                        <?php if (($char['namefamiliar']) == ''): ?>
                        <?php else: ?>
                            <p>
                                <?php print_r($char['gender']); ?> has a familiar named
                                <b>
                                    <?php print_r($char['namefamiliar']); ?>
                                </b> who's a
                                <i>
                                    <?php print_r($char['typefamiliar']); ?>
                                </i>.
                            </p>
                        <?php endif; ?>
                        <?php if (empty($char['groups'])): ?>
                        <?php else: ?>
                            <p>
                                <?php print_r($char['gender']); ?> is part of the
                                <i>
                                    <?php print_r($char['groups']); ?>
                                </i>.
                            </p>
                        <?php endif; ?>
                        <?php if (empty($char['namefriend'])): ?>
                        <?php else: ?>
                            <p>
                                <?php print_r($char['gender']); ?> is friend with
                                <?php print_r($char['namefriend']); ?>.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (isset($_SESSION['admin'])): ?> <a
                        href="./thumbnail.php?thumbnail_name=<?php print_r($char['char_namechar']); ?>" class="btn">
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