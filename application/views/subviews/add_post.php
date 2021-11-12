<h1>Add Post</h1>
    <div style="margin-top: 30px;">
    <form action="<?php echo MAIN; ?>Posts/handle_post" method="POST">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Post Title" name="post_title">
      </div>
      <div class="form-group">
        <label for="post_short_desc">Post Short Description</label>
        <input type="text" class="form-control" id="post_short_desc" aria-describedby="emailHelp" placeholder="Post Short Description" name="post_short_desc">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Post Long Description</label>
        <textarea name="post_long_desc" placeholder="Post Long Description"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>