<?php $page = 'Home'; ?>
<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/public_functions.php') ?>
<?php $posts = getPublishedPosts(); ?>
<?php $feats = getFeaturedPosts(); ?>
<?php $topics = getAllTopics(); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<?php include './includes/success_message.php'; ?>

<section class="featured">
    <div class="container featured__container">
        <?php foreach ($feats as $feat): ?>
            <div class="post__thumbnail">
                <img src="<?php echo 'static/images/' . $feat['i_image'] ?>">
            </div>

            <div class="post__info">
                <?php if (isset($feat['name'])): ?>
                    <a href="<?php echo 'filtered_posts.php?topic=' . $feat['t_id'] ?>" class="category__button">
                        <?php echo $feat['name'] ?>
                    </a>
                <?php endif; ?>

                <h2 class="post__title">
                    <a href="single_post.php?post-slug=<?php echo $feat['p_slug']; ?>">
                        <?php echo $feat['title'] ?>
                    </a>
                </h2>

                <p class="post__body">
                    <?php echo substr($feat['body'], 0, 150) . '...' ?>
                </p>

                <div class="post__author">
                    <div class="post__author-info">
                        <h5>By:
                            <?php echo $feat['username'] ?>
                        </h5>

                        <small>
                            <?php echo $feat["created_at"]; ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- ================================= END FEATURED ================================= -->
<section class="posts">
    <section class="posts">
        <div class="container posts__container">
            <?php foreach ($posts as $post): ?>
                <article class="post">
                    <div class="post__thumbnail">
                        <img src="<?php echo 'static/images/' . $post['i_image'] ?>">
                    </div>

                    <div class="post__info">
                        <?php if (isset($post['name'])): ?>
                            <a href="<?php echo 'filtered_posts.php?topic=' . $post['t_id'] ?>"
                                class="category__button">
                                <?php echo $post['name'] ?>
                            </a>
                        <?php endif; ?>

                        <h3 class="post__title">
                            <a href="single_post.php?post-slug=<?php echo $post['p_slug']; ?>">
                                <?php echo $post['title'] ?>
                            </a>
                        </h3>

                        <p class="post__body">
                            <?php echo substr($post['body'], 0, 150) . '...' ?>
                        </p>

                        <div class="post__author">
                            <div class="post__author-info">
                                <h5>
                                    By:
                                    <?php echo $post['username'] ?>
                                </h5>

                                <small>
                                    <?php echo $post["created_at"]; ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- ================================= END POSTS ================================= -->
    <section class="category__buttons">
        <div class="container category__buttons-container">
            <?php foreach ($topics as $topic): ?>
                <a href="<?php echo 'filtered_posts.php?topic=' . $topic['id'] ?>" class="category__button">
                    <?php echo $topic['name']; ?>
                </a>
            <?php endforeach ?>
        </div>
    </section>
    <!-- ================================= END CATEGORY BUTTONS ================================= -->
    <?php include(ROOT_PATH . '/includes/footer.php'); ?>
    <!-- ================================= END FOOTER ================================= -->