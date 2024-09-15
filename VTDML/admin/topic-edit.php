<?php $page = 'Admin | Edit Topic'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <form action="topic-edit.php" method="post">
            <h2>Edit Topic</h2>

            <input type="hidden" name="id" value="<?php echo $top_id ?>">

            <input type="text" name="name" value="<?php echo $top_name ?>" placeholder="Name">

            <button type="submit" name="edit-topic" class="btn">Edit Post</button>
        </form>
    </div>
</section>
<!-- ================================= END POST EDIT FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->