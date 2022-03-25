<main class="main-blog">
    <div class="banner">
        <img src="../public/images/header-bg.jpg" alt="">
        <span>Trincot > Blog > <strong>Search: <?= $_GET['s'] ?></strong></span>
    </div>
    <div class="body-blog">
        <form action="?p=posts." method="get">
            <input class="input input-search" type="text" name="s" id="s" placeholder="Search..." autocomplete="off">
            <button type="submit">Search</button>
        </form>
        <div class="content-blog">
            <div class="content">
                <?php
                    foreach($postPaginationFind as $post) {                        
                ?>
                    <div class="post">
                        <div class="post-image"><img src="<?= "../public/admin/img/uploads/".$post->picture ?>" alt="" class="post-image"></div>
                        <div class="post-category"><h4><?= $post->categorie; ?></h4></div>
                        <a href="<?= $post->url; ?>"><h1 class="post-title"><?= $post->name ?></h1></a>
                        <div class="author-post">
                            <i class="lni-user"></i>
                            <p><strong> kevin</strong></p>
                        </div>
                        <span class="post-content"><?= $post->extrait; ?></span>
                        <div class="footer-post">
                            <a href="<?= $post->url; ?>">Learn More</a>
                            <p class="time">7 days ago.</p>
                        </div>
                    </div>
                <?php
                    }
                ?>
                
                <div class="page-blog">
                    <a href="?p=posts.search&s=<?= $_GET['s'] ?>&page=<?= $currentPage - 1 ?>" class="<?= ($currentPage === 1) ? "disabled" : "" ?>"><i class="lni-angle-double-left"></i></a>
                    <?php
                        for($page = 1; $page <= $pages; $page++):
                    ?>
                        <a href="?p=posts.search&s=<?= $_GET['s'] ?>&page=<?= $page ?>" class="<?= ($currentPage == $page) ? "active" : "" ?>"><?= $page ?></a>
                    <?php
                        endfor
                    ?>
                    <a href="?p=posts.search&s=<?= $_GET['s'] ?>&page=<?= $currentPage + 1 ?>" class="<?= ($currentPage == $pages) ? "disabled" : "" ?>"><i class="lni-angle-double-right"></i></a>
                </div>
            </div>
            <div class="sidebar">
                <div class="categories">
                    <h2>Categories</h2>
                    <ul>
                        <?php
                            foreach($categories as $category) {
                                $i = 0;
                        ?>
                            <li><a href="<?= $category->url; ?>" data-count="<?= $category->nbArticle ?>"><?= $category->name; ?></a></li>
                        <?php
                                $i++;
                            }
                        ?>
                    </ul>
                </div>
                <hr>
                <div class="best-post">
                    <h2>Bests posts</h2>
                    <?php
                        foreach ($postComment as $postComments) {
                    ?>
                    <a href="<?= $postComments->url ?>">
                        <img src="../public/admin/img/uploads/<?= $postComments->picture ?>" alt="">
                        <h4><?= $postComments->name ?></h4>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        
    </div>
</main>
    