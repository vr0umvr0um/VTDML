<?php $page = 'Admin | Manage User'; ?>
<?php require_once('../config.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/admin_function.php'); ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<!-- ================================= END HEAD SECTION ================================= -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
<!-- ================================= END NAVIGATION BAR ================================= -->
<section class="dashboard">
    <div class="container dashboard__container">
        <?php include 'includes/aside.php' ?>
        <main>
            <h2>Manage User</h2>

            <?php include '../includes/success_message.php'; ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $key => $users): ?>
                        <tr>
                            <td>
                                <?php echo $key + 1 ?>
                            </td>
                            <td>
                                <?php echo $users['fname'] ?>
                            </td>
                            <td>
                                <?php echo $users['lname'] ?>
                            </td>
                            <td>
                                <?php echo $users['username'] ?>
                            </td>
                            <td>
                                <?php echo $users['email'] ?>
                            </td>
                            <td>
                                <?php if ($users['admin'] == 1): ?>
                                    Admin
                                <?php else: ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="./user-edit.php?user_up_id=<?php echo $users['id'] ?>" class="btn sm">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="./user-manage.php?user_del_id=<?php echo $users['id'] ?>" class="btn sm danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</section>
<!-- ================================= END DASHBOARD ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->