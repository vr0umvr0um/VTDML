<?php $page = 'Admin | Add User'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <form action="user-add.php" method="post">
        <?php include '../includes/errors_message.php'; ?>

            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">

            <input type="text" name="username" placeholder="Username">

            <input type="text" name="email" placeholder="Email">

            <input type="password" name="password" placeholder="Password">
            <input type="password" name="cpassword" placeholder="Confirm Password">

            <select name="admin">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>

            <input type="submit" name="add-user" class="btn" value="Add User">
        </form>
    </div>
</section>
<!-- ================================= END ADD USER FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->