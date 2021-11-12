<h1>Add Homework</h1>
<div style="margin-top: 30px;">
<form action="<?php echo MAIN; ?>Teacher_homework/handle_homework" method="POST">
  <div class="form-group">
    <label for="homework_short">Homework Short Description</label>
    <input type="text" class="form-control" id="homework_short" aria-describedby="emailHelp" placeholder="Homework Short Description" name="homework_short_desc">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Homework Long Description</label>
    <textarea name="homework_long_desc" placeholder="Homework Long Description"></textarea>
  </div>
  <div class="form-group">
    <label for="resource">Homework Resource</label>
    <input type="text" class="form-control" id="resource" aria-describedby="emailHelp" placeholder="Homework Resource" name="resource_file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>