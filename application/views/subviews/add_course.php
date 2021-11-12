<form class="login-form" action="http://localhost/Bil372_Grup4_Etunet/index.php/Courses/real_add_course" method="post">
  <div class="form-group">
    <label for="courseName">Course Name</label>
    <input type="text" class="form-control" id="courseName" aria-describedby="emailHelp" placeholder="Enter Course Name" name="course_name">
  </div>
  <div class="form-group">
    <label for="courseShort">Course Short Description</label>
    <textarea class="form-control" id="courseShort" aria-describedby="emailHelp" placeholder="Enter Course Short Desc" name="course_short_desc" maxlength="125"></textarea>
  </div>
  <div class="form-group">
    <label for="courselong">Course Description</label>
    <textarea class="form-control" id="courseShort" aria-describedby="emailHelp" placeholder="Enter Course Desc" name="course_description" maxlength="500"></textarea>
  </div>
  <input type="Submit" value="Add" style="margin-top: 5px;">
</form>