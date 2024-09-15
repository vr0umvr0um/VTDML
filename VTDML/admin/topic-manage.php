<?php $page = 'Admin | Manage Topic'; ?>
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
            <h2>Manage Topics</h2>

            <?php include '../includes/success_message.php'; ?>

            <?php if (empty($topics)): ?>
                <h1>No topics in the database.</h1>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($topics as $key => $topics): ?>
                            <tr>
                                <td>
                                    <?php print_r($key + 1); ?>
                                </td>
                                <td>
                                    <?php print_r($topics['name']); ?>
                                </td>
                                <td>
                                    <a href="./topic-edit.php?top_up_id=<?php print_r($topics['id']); ?>" class="btn sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="./topic-manage.php?top_del_id=<?php print_r($topics['id']); ?>"
                                        class="btn sm danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
    </div>
</section>
<!-- ================================= END DASHBOARD ================================= -->
<?php include(ROOT_PATH . '/admin/includes/footer.php'); ?>
<!-- ================================= END FOOTER ================================= -->