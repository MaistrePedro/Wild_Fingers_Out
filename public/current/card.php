<div class="blog-post">
    <div class="post-content">
        <h2 data-target="#<?php echo "produit" . ($key + 1); ?>" aria-labelledby="modal"><?php echo $value[2] ?><br/><small> By <?php echo $value[1] ?></small></h2>

        <p><big><?php echo $value [3] ?></big></p>
        <a data-target="#"><h3>Add a comment</h3></a>

        <?php
        // connect to the database
        $con = mysqli_connect('localhost', 'root', 'maille99', 'wildFingersOut');

        if (isset($_POST['liked'])) {
            $postid = $_POST['postid'];
            $result = mysqli_query($con, "SELECT * FROM posts WHERE id=" . "$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($con, "INSERT INTO likes (userid, postid) VALUES (1, $postid)");
            mysqli_query($con, "UPDATE posts SET likes=$n+1 WHERE id=$postid");

            echo $n+1;
            exit();
        }
        if (isset($_POST['unliked'])) {
            $postid = $_POST['postid'];
            $result = mysqli_query($con, "SELECT * FROM posts WHERE id=" . "$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($con, "DELETE FROM likes WHERE postid=$postid AND userid=1");
            mysqli_query($con, "UPDATE posts SET likes= $n-1 WHERE id=$postid");

            echo $n-1;
            exit();
        }

        // Retrieve posts from the database
        $posts = mysqli_query($con, "SELECT * FROM posts");
        ?>

        <?php while ($row = mysqli_fetch_array($posts)) { ?>

            <div class="post">
                <?php echo $row['text']; ?>

                <div style="padding: 2px; margin-top: 5px;">
                    <?php
                    // determine if user has already liked this post
                    $results = mysqli_query($con, "SELECT * FROM likes WHERE userid=1 AND postid=".$row['id']."");

                    if (mysqli_num_rows($results) == 1 ): ?>
                        <!-- user already likes post -->
                        <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
                        <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
                    <?php else: ?>
                        <!-- user has not yet liked post -->
                        <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
                        <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
                    <?php endif ?>

                    <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<script>
    $(document).ready(function(){
        // when the user clicks on like
        $('.like').on('click', function(){
            var postid = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'liked': 1,
                    'postid': postid
                },
                success: function(response){
                    $post.parent().find('span.likes_count').text(response + " likes");
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                }
            });
        });

        // when the user clicks on unlike
        $('.unlike').on('click', function(){
            var postid = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'unliked': 1,
                    'postid': postid
                },
                success: function(response){
                    $post.parent().find('span.likes_count').text(response + " likes");
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                }
            });
        });
    });
</script>

