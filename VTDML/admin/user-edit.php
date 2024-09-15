<?php $page = 'Admin | Edit User'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
    <form action="user-edit.php" method="post">
            <h2>Edit User</h2>
            <input type="hidden" name="id" value="<?php echo $user_id ?>">

            <input type="text" name="fname" value="<?php echo $user_fname ?>" placeholder="First Name">
            <input type="text" name="lname" value="<?php echo $user_lname ?>" placeholder="Last Name">

            <input type="text" name="username" value="<?php echo $user_username ?>" placeholder="Username">

            <input type="text" name="email" value="<?php echo $user_email ?>" placeholder="Email">

            <select name="admin">
                <option value="<?php echo $user_admin ?>">
                    <?php if ($user_admin == 1): ?>
                        Admin
                    <?php else: ?>
                        User
                    <?php endif; ?>
                </option>

                <?php if ($user_admin === 1): ?>
                    <option value="0">User</option>
                <?php else: ?>
                    <option value="1">Admin</option>
                <?php endif; ?>
            </select>

            <input type="hidden" name="password" value="<?php echo $user_pass ?>">
           
            <input type="submit" name="edit-user" class="btn" value="Edit User">
        </form>
    </div>
</section>
<!-- ================================= END EDIT USER FORM ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->