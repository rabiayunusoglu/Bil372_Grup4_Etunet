<h1>Update Comment</h1>
<div style="margin-top: 30px;">
<form action="<?php echo MAIN; ?>Posts/handle_comment_update/<?php echo $comment['comment_id']; ?>/<?php echo $comment['comment_post_id']; ?>" method="POST">
  <div class="form-group">
    <label for="comment_des">Comment Description</label>
    <textarea type="text" class="form-control" id="comment_des" aria-describedby="emailHelp" placeholder="Comment Description" name="comment_des"><?php echo $comment['comment_desc']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>