<p class="card-description" style="font-size:30px"><b> Taken Courses</b> </p>
  
   <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Course Short Description</th>
        <th>Drop</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($courses as $course){ ?>
        <tr>
          <td><?php echo $course['course_name']; ?></td> 
          <td><?php echo $course['course_description']; ?></td> 
          <td><?php echo $course['course_short_desc']; ?></td> 
          <td><a href="<?php echo MAIN; ?>Courses/drop_course/<?php echo $course['course_id']; ?>" >Drop</a></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>

  <p class="card-description" style="font-size:30px"><b> All Courses</b> </p>
  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Course Short Description</th>
        <th>Enroll</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($all_courses as $course){ ?>
        <tr>
          <td><?php echo $course['course_name']; ?></td> 
          <td><?php echo $course['course_description']; ?></td> 
          <td><?php echo $course['course_short_desc']; ?></td> 
          <td><a href="<?php echo MAIN; ?>Courses/enroll_course/<?php echo $course['course_id']; ?>" >Enroll</a></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>