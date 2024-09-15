<?php $page = 'Admin | Manage Post'; ?>
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
            <h2>Manage Posts</h2>

            <?php include '../includes/success_message.php'; ?>

            <?php if (empty($posts_users)): ?>
                <h1>No posts in the database.</h1>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Featured</th>
                            <th>Published</th>
                            <th>Add Thumbnail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($posts_users as $key => $posts_users): ?>
                            <tr>
                               
                                <td>
                                    <?php print_r($posts_users['title']); ?>
                                </td>
                                <td>
                                    <?php print_r($posts_users['name']); ?>
                                </td>
                                <td>
                                    <?php print_r($posts_users['username']); ?>
                                </td>
                                <td>
                                    <?php if (($posts_users['featured']) === 1): ?>
                                        Featured
                                    <?php else: ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (($posts_users['published']) === 1): ?>
                                        Published
                                    <?php else: ?>
                                        Not Published
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="./thumbnail.php?thumbnail_name=<?php print_r($posts_users['title']); ?>" class="btn">
                                        Thumbnail
                                    </a>
                                </td>
                                <td>
                                    <a href="./post-edit.php?post_up_id=<?php print_r($posts_users['p_id']); ?>" class="btn sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="./post-manage.php?post_del_id=<?php print_r($posts_users['p_id']); ?>"
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