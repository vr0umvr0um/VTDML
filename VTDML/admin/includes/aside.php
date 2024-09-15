<aside>
    <ul>
        <li>
            <a href="./post-add.php">
                <i class="ri-pencil-line"></i>
                <h5> Add Post</h5>
            </a>
        </li>

        <li>
            <a href="./post-manage.php" <?php echo ($page == 'Admin | Manage Post') ? "class='active'" : ""; ?>>
                <i class="ri-edit-line"></i>
                <h5>Manage Posts</h5>
            </a>
        </li>

        <li>
            <a href="./user-add.php">
                <i class="ri-user-add-line"></i>
                <h5>Add User</h5>
            </a>
        </li>

        <li>
            <a href="./user-manage.php" <?php echo ($page == 'Admin | Manage User') ? "class='active'" : ""; ?>>
                <i class="ri-user-settings-line"></i>
                <h5>Manage User</h5>
            </a>
        </li>

        <li>
            <a href="./topic-add.php">
                <i class="ri-file-copy-line"></i>
                <h5>Add Category</h5>
            </a>
        </li>

        <li>
            <a href="./topic-manage.php" <?php echo ($page == 'Admin | Manage Topic') ? "class='active'" : ""; ?>>
                <i class="ri-file-copy-2-line"></i>
                <h5>Manage Categories</h5>
            </a>
        </li>
    </ul>

    <div class="dashboard__toggle">
        <i class="ri-arrow-left-s-line dash__ouvrir"></i>
        <i class="ri-arrow-right-s-line dash__fermer"></i>

        <script>
            let dashboard = document.querySelector('.dashboard__toggle');
            let aside = document.querySelector('aside');

            dashboard.addEventListener('click', function () {
                aside.classList.toggle('open');
            })
        </script>
    </div>
</aside>