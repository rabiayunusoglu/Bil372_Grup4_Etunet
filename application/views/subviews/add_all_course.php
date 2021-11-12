<h1>Add Course</h1>
<div style="margin-top: 30px;">
    <form action="<?php echo MAIN; ?>Teacher_courses/handle_course" method="POST">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" aria-describedby="emailHelp" placeholder="Course Name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course">Course Description</label>
            <input type="text" class="form-control" id="desc" aria-describedby="emailHelp" placeholder="Course Short Description" name="course_description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Course Description</label>
            <textarea name="course_short_desc" placeholder="Course  Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>