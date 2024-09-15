<?php $page = 'Single Post'; ?>
<?php require_once('config.php'); ?>
<?php require_once('includes/public_functions.php') ?>
<?php
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
$topics = getAllTopics();
?>
<?php require_once('includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="singlepost">
    <div class="container singlepost__container">
        <?php if ($post['published'] == false): ?>
            <h2 class="post-title">
                Sorry... This post has not been published
            </h2>
        <?php else: ?>
            <h2>
                <?php echo $post['title']; ?>
            </h2>

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

            <div class="singlepost__thumbnail">
                <img src="<?php echo 'static/images/' . $post['image'] ?>">
            </div>

            <p>
                <?php echo $post['body']; ?>
            </p>
        <?php endif ?>
    </div>
</section>
<!-- ================================= END SINGLE POST ================================= -->
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->