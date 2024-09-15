<?php $page = 'Admin | Edit Post'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <form action="post-edit.php" method="post">
            <h2>Edit Post</h2>

            <input type="hidden" name="id" value="<?php print_r($post_id) ?>">

            <input type="hidden" name="user_id" value=<?php echo $_SESSION['id']; ?>>

            <input type="text" name="title" value="<?php print_r($post_title) ?>" placeholder="Title">

            <select name="topic_id">
                <option value="<?php print_r($pt_t_id) ?>">
                    <?php print_r($post_top) ?>
                </option>

                <?php foreach ($topics as $key => $topics): ?>
                    <?php if ($pt_t_id == $topics['id']): ?>
                    <?php else: ?>
                        <option value="<?php print_r($topics['id']); ?>">
                            <?php print_r($topics['name']); ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <textarea rows="10" name="body" placeholder="Body"><?php print_r($post_body) ?></textarea>

            <div class="form__control inline">
                <select name="featured">
                    <option value="<?php print_r($post_feat) ?>">
                        <?php if ($post_feat === 1): ?>
                            Featured
                        <?php else: ?>
                            Not Featured
                        <?php endif; ?>
                    </option>

                    <?php if ($post_feat === 1): ?>
                        <option value="0">Unfeatured</option>
                    <?php else: ?>
                        <option value="1">Featured</option>
                    <?php endif; ?>
                </select>

                <select name="published">
                    <option value="<?php print_r($post_pub) ?>">
                        <?php if ($post_pub === 1): ?>
                            Published
                        <?php else: ?>
                            Not Published
                        <?php endif; ?>
                    </option>

                    <?php if ($post_pub === 1): ?>
                        <option value="0">Unpublished</option>
                    <?php else: ?>
                        <option value="1">Published</option>
                    <?php endif; ?>
                </select>
            </div>

            <input type="hidden" name="image">

            <button type="submit" name="edit-post" class="btn">Edit Post</button>
        </form>
    </div>
</section>
<!-- ================================= END POST EDIT FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->