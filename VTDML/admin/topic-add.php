<?php $page = 'Admin | Add Topic'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <form action="topic-add.php" method="post">
            <h2>Add Topic</h2>

            <?php include '../includes/errors_message.php'; ?>

            <input type="text" name="name" placeholder="Name">

            <input type="submit" name="add-topic" class="btn" value="Add Topic">
        </form>
    </div>
</section>
<!-- ================================= END POST ADD FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->