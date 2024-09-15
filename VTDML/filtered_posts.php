<?php $page = "Category Posts" ?>
<?php require_once('config.php'); ?>
<?php require_once('includes/public_functions.php'); ?>
<?php $topics = getAllTopics(); ?>
<?php require_once('includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php
// Get posts under a particular topic
if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getPublishedPostsByTopic($topic_id);
}
?>
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<header class="category__title">
    <h2>
        Articles on <u>
            <?php echo getTopicNameById($topic_id); ?>
        </u>
    </h2>
</header>
<!-- ================================= END CATEGORY TITLE ================================= -->
<section class="posts">
    <div class="container posts__container">
        <?php foreach ($posts as $post): ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?php echo 'static/images/' . $post['i_image'] ?>">
                </div>

                <div class="post__info">
                    <h3 class="post__title">
                        <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                            <?php echo $post['title'] ?>
                        </a>
                    </h3>

                    <p class="post__body">
                        <?php echo substr($post['body'], 0, 150) . '...' ?>
                    </p>

                    <div class="post__author">
                        <div class="post__author-info">
                            <h5>
                                By: <?php echo $post['username'] ?>
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
<!-- ================================= END CATEGORY POSTS ================================= -->
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->