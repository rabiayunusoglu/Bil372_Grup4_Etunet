<h1>Detail Homework</h1>
    <div style="margin-top: 30px;">
     <form action="<?php echo MAIN; ?>Student_homework/handle_detail/<?php echo $homework['homework_id']; ?>" method="POST">
    <div class="form-group">
      <label for="homework_short">Homework Short Description</label>
      <input type="text" style="width: 120%" class="form-control" id="homework_short" aria-describedby="emailHelp" placeholder="Homework Short Description" name="homework_short_desc" value="<?php echo $homework['homework_short_desc']; ?>"disabled>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Homework Long Description</label>
      <textarea style="width: 120%" name="homework_long_desc" placeholder="Homework Long Description" disabled><?php echo $homework['homework_long_desc']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="resource">Homework Resource</label>
      <input type="text" style="width: 120%" class="form-control" id="resource" aria-describedby="emailHelp" placeholder="Homework Resource" name="resource_file" value="<?php echo $homework['resource_file']; ?>"disabled>
    </div>
 
</form>
</div>
