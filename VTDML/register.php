<?php $page = "Register" ?>
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

        <form action="register.php" method="post" id="signup">
            <?php include(ROOT_PATH . '/includes/errors_message.php') ?>

            <input type="text" name="fname" value="<?php echo $fname ?>" placeholder="First Name">
            <input type="text" name="lname" value="<?php echo $lname ?>" placeholder="Last Name">

            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username">

            <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">

            <input type="password" name="password" value="<?php echo $password ?>" placeholder="Password">
            <input type="password" name="cpassword" value="<?php echo $cpassword ?>" placeholder="Confirm Password">

            <input type="submit" name="register" value="Register" class="btn">

            <small>Already have an account? <a href="login.php">Login !</a></small>
        </form>
    </div>
</section>
<!-- ================================= END REGISTER ================================= -->
<?php include(ROOT_PATH . '/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->