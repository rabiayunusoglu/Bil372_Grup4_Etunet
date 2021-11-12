<div class="card" style="width: 250%;">
    <div class="card-body" style="background-color: #ecf0f1;">
        <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
        <p class="card-text"><?php echo $post['post_short_desc']; ?></p>
        <p class="card-text"><?php echo $post['post_long_desc']; ?></p>
        <p class="card-text"><?php echo $post['post_date']; ?></p>
        <?php if($post['post_student_id'] == $added_id || $post['post_teacher_id'] == $added_id){ ?>
        	<div style="text-align: right;">
        		<a href="<?php echo MAIN; ?>Posts/update_post/<?php echo $post['post_id']; ?>" class="card-link">Edit Post</a>	
        	</div>
        <?php } ?>
    </div>
</div>

<hr class="rounded" style="width: 250%;">

<h1>Comments</h1>
<?php foreach ($real_comments as $comment) { ?>
    <div class="card" style="width: 250%;">
      <div class="card-body">
        <?php if($comment['comment_added_id'] == $added_id || $type === 'teacher'){ ?>
            <a href="<?php echo MAIN; ?>Posts/delete_comment/<?php echo $comment['comment_id']; ?>/<?php echo $comment['comment_post_id']; ?>" role="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </a>
        <?php } ?>
        <blockquote class="blockquote mb-0">
          <p><?php echo $comment['comment_desc']; ?></p>
          <p><?php echo $comment['comment_date']; ?></p>
          <?php if(!empty($comment['teacher'])){ ?>
            <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $comment['teacher']['teacher_name']; ?></cite></footer>
          <?php } ?>
          <?php if(!empty($comment['student'])){ ?>
            <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $comment['student']['student_name']; ?></cite></footer>
          <?php } ?>
        </blockquote>

        <?php if($comment['comment_added_id'] == $added_id || $type === 'teacher'){ ?>
        <div style="text-align: right;">
            <a href="<?php echo MAIN; ?>Posts/update_comment/<?php echo $comment['comment_id']; ?>/<?php echo $comment['comment_post_id']; ?>">Edit Comment</a>  
        </div>
        <?php } ?>
      </div>
    </div>
<?php } ?>

<hr class="rounded" style="width: 250%;">
<form action="<?php echo MAIN; ?>Posts/add_comment/<?php echo $post['post_id']; ?>" method="POST">
    <div class="form-group">
        <textarea name="comment_desc" placeholder="Your Comment..."></textarea>
    </div>
    <input style="background-color: #34495E!important;color: rgb(255,255,255);" type="Submit" value="Add Comment" style="margin-top: 5px;">
</form>