<?php $topics = getAllTopics(); ?>

<footer>
    <div class="footer__socials">
        <a href="#" target="_blank"><i class="ri-tumblr-line"></i></a>
        <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
        <a href="#" target="_blank"><i class="ri-messenger-line"></i></a>
        <a href="#" target="_blank"><i class="ri-facebook-line"></i></a>
    </div>

    <div class="container footer__container">
        <article>
            <h4>
                Categories
            </h4>
            <ul>
                <?php foreach ($topics as $topic): ?>
                    <li>
                        <a href="<?php echo '../filtered_posts.php?topic=' . $topic['id'] ?>">
                            <?php echo $topic['name']; ?>
                        </a>
                    </li>
                <?php endforeach ?>

            </ul>
        </article>

        <article>
            <h4>
                Support
            </h4>
            <ul>
                <li>
                    <a href="">Online support</a>
                </li>
                <li>
                    <a href="">Call Numbers</a>
                </li>
                <li>
                    <a href="">Emails</a>
                </li>
                <li>
                    <a href="">Social Support</a>
                </li>
            </ul>
        </article>

        <article>
            <h4>
                Blog
            </h4>
            <ul>
                <li>
                    <a href="">Safety</a>
                </li>
                <li>
                    <a href="">Repair</a>
                </li>
                <li>
                    <a href="">Recent</a>
                </li>
                <li>
                    <a href="">Popular</a>
                </li>
            </ul>
        </article>

        <article>
            <h4>
                Permalinks
            </h4>
            <ul>
                <li>
                    <a href="../index.php">Home</a>
                </li>
                <li>
                    <a href="../blog.php">Blog</a>
                </li>
                <li>
                    <a href="../characters.php">Characters</a>
                </li>
                <li>
                    <a href="../entertainment.php">Entertainment</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
            </ul>
        </article>
    </div>

    <div class="footer__copyright">
        <small>Copyright &copy; 2023 VTDML</small>
    </div>
</footer>

</body>

</html>