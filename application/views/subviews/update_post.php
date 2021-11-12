<h1>Add Post</h1>
    <div style="margin-top: 30px;">
    <form action="<?php echo MAIN; ?>Posts/handle_update/<?php echo $post['post_id']; ?>" method="POST">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Post Title" name="post_title" value="<?php echo $post['post_title']; ?>">
      </div>
      <div class="form-group">
        <label for="post_short_desc">Post Short Description</label>
        <input type="text" class="form-control" id="post_short_desc" aria-describedby="emailHelp" placeholder="Post Short Description" name="post_short_desc" value="<?php echo $post['post_short_desc']; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Post Long Description</label>
        <textarea name="post_long_desc" placeholder="Post Long Description"><?php echo $post['post_long_desc']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>