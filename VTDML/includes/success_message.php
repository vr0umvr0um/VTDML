<?php if (isset($_SESSION['message'])): ?>
<div class="alert__message success message">
    <p>
        <?php echo $_SESSION['message'] ?>
        <?php unset($_SESSION['message'])?>
    </p>
</div>
<?php else: ?>
<?php endif; ?>