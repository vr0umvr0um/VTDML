<?php $page = "Login" ?>
<?php require_once('config.php'); ?>
<?php require_once('includes/public_functions.php'); ?>
<?php $topics = getAllTopics(); ?>
<?php require_once('includes/head_section.php'); ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>

        <form action="login.php" method="post">
            <?php include(ROOT_PATH . '/includes/errors_message.php') ?>

            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username">
            <input type="password" name="password" value="<?php echo $password ?>" placeholder="Password">

            <input type="submit" name="login" value="Log In" class="btn">

            <small>Don't have an account? <a href="register.php">Sign Up !</a></small>
        </form>
    </div>
</section>
<!-- ================================= END LOGIN ================================= -->
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->