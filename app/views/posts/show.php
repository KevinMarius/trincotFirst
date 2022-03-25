<main class="mains">
    <div class="post-detail">
        <img src="<?= "../public/admin/img/uploads/".$post->picture ?>" alt="">
        <h1><?= $post->name; ?></h1>
        <p><?= $post->description; ?></p>
        <p>

    </div>
    <h1>Comments</h1>
    <div class="list-comments">
        <div class="items-comments">
            <?php
                foreach($comments as $comment) {
            ?>
                <div class="item">
                    <div class="user-info">
                        <span class="lni-user"></span>
                        <h4><?= $comment->from_user ?></h4>
                        <p class="date">
                            <?= $comment->created_at ?>
                        </p>
                    </div>
                    <p class="comment"><?= $comment->comment ?></p>
                </div>
            <?php
                }
            ?>
            <!--<div class="item-response">
                <div class="user-info">
                    <span class="lni-user"></span>
                    <h4>Henri</h4>
                    <span class="date">
                        <p>12/02/2021, 15h02</p>
                    </span>
                </div> 
                <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, delectus suscipit officia quae architecto, eligendi fuga unde ducimus explicabo illo iusto soluta quia voluptate tempore eaque. Excepturi iusto distinctio facere.
                Eius, totam ex id odio rerum aliquam laborum ipsam facere labore recusandae, possimus eaque magni? Error, laboriosam laudantium saepe rem et velit perferendis dolorem a enim ipsam necessitatibus molestiae porro.</p>
            </div>-->
        </div>
    </div>
    <hr>
    <form method="post">
        <input type="text" name="name" id="name" class="input input-text" placeholder="from">
        <textarea name="comment" id="comment" cols="30" rows="10" class="input textarea" placeholder="Comment"></textarea>
        <button type="submit">post comment</button>
    </form>
</main>

    