<body>
    <nav>
        <div class="container nav__container">

            <a href="./index.php" class="nav_logo"> Vro0umVr0um's Trip Down Memory Lane</a>

            <ul class="nav__items">
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./characters.php">Characters</a></li>
                <li><a href="./entertainment.php">Entertainment</a></li>
                <li><a href="">Contact</a></li>
                <li class="nav__profile">
                    <?php if (isset($_SESSION['id'])): ?>
                        <a href="">
                            <i class="ri-user-fill">
                                <?php echo $_SESSION['username'] ?>
                            </i>
                        </a>
                        <ul>
                            <li><a href="./admin/post-manage.php">Dashboard</a></li>
                            <li><a href="./logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="./register.php">Account</a>
                    <?php endif; ?>
                </li>
            </ul>

            <div class="nav__toggle">
                <i class="ri-menu-line nav__ouvrir"></i>
                <i class="ri-close-line nav__fermer"></i>

                <script>
                    let toogle = document.querySelector('.nav__toggle');
                    let nav = document.querySelector('nav');

                    toogle.addEventListener('click', function () {
                        nav.classList.toggle('open');
                    })
                </script>
            </div>
        </div>
    </nav>
    <!-- ================================= END NAVBAR ================================= -->