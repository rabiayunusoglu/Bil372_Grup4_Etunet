<h1>Add Resource</h1>
<div style="margin-top: 30px;">
<form action="<?php echo MAIN; ?>Student_resource/handle_resource" method="POST">
  <div class="form-group">
    <label for="homework_short">Resource Short Description</label>
    <input type="text" style="width: 100%" class="form-control" id="homework_short" aria-describedby="emailHelp" placeholder="Resource Short Description" name="resource_short_desc">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Resource Long Description</label>
    <textarea  style="width: 100%" name="resource_long_desc" placeholder="Resource Long Description"></textarea>
  </div>
  <div class="form-group">
    <label for="resource">Resources Resource</label>
    <input type="text" style="width: 100%" class="form-control" id="resource" aria-describedby="emailHelp" placeholder="Resources Resource" name="resource_url">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>