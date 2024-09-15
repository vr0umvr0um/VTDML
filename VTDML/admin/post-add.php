<?php $page = 'Admin | Add Post'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <form action="post-add.php" method="post">
            <h2>Add Post</h2>

            <?php include '../includes/errors_message.php'; ?>

            <input type="hidden" name="user_id" value=<?php echo $_SESSION['id']; ?>>
            <input type="text" name="title" placeholder="Title">

            <select name="topic_id">
                <?php foreach ($topics as $key => $topics): ?>
                    <option value="<?php echo $topics['id'] ?>">
                        <?php echo $topics['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <textarea rows="10" name="body" placeholder="Body"></textarea>

            <div class="form__control inline">
                <select name="featured">
                    <option value="0">Not Featured</option>
                    <option value="1">Featured</option>
                </select>

                <select name="published">
                    <option value="0">Not published</option>
                    <option value="1">Published</option>
                </select>
            </div>

            <input type="hidden" name="image">

            <input type="submit" name="add-post" class="btn" value="Add Post">
        </form>
    </div>
</section>
<!-- ================================= END POST ADD FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->