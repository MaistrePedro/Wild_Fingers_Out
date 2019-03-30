<div class="blog-post" data-target="#idea<?php echo $value['id']; ?>">
    <div class="post-content">
        <ul class="post-meta">
            <li>By <a href="#"><?php echo $value['user_name'] ?></a></li>
        </ul>
        <h3 ><?php echo $value['title']; ?></h3>
        <p><?php echo $value['idea']; ?></p>
        <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>">Let's see the Comments !</button>
    </div>

</div>
<!-- modal -> commentaires -->

<div id="myModal<?php echo $value['id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><?php echo $value['title']; ?></h3>
            </div>
            <div class="modal-body">
                <p>Commentaires....</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Add a comment</button>
            </div>
        </div>
        
    </div>
</div>

