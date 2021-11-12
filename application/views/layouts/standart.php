<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("containers/head"); ?>
    </head>

    <body>
        <header>
            
            <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-color: #34495E!important;">
              <a class="navbar-brand" href="<?php echo MAIN; ?>Dashboard" style="color: #FFFFFF!important;">Home</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <?php if($type === 'teacher'){ ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF!important;">
                      My Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php foreach ($courses as $course) { ?>
                         <a class="dropdown-item" href="<?php echo MAIN; ?>Dashboard/set_course/<?php echo $course['course_id']; ?>"><?php echo $course['course_name']; ?></a>
                      <?php } ?>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo MAIN; ?>Teacher_homework" style="color: #FFFFFF!important;">Homework</a>
                  </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo MAIN; ?>Teacher_resource" style="color: #FFFFFF!important;">Resources</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo MAIN; ?>Teacher_courses" style="color: #FFFFFF!important;">Courses</a>
                      </li>
                  <?php } ?>

                  <?php if($type === 'student'){ ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF!important;">
                      My Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php foreach ($courses as $course) { ?>
                         <a class="dropdown-item" href="<?php echo MAIN; ?>Dashboard/set_course/<?php echo $course['course_id']; ?>"><?php echo $course['course_name']; ?></a>
                      <?php } ?>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo MAIN; ?>Student_homework" style="color: #FFFFFF!important;">Homework</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo MAIN; ?>Student_resource" style="color: #FFFFFF!important;">Resources</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo MAIN; ?>Courses" style="color: #FFFFFF!important;">Courses</a>
                  </li>
                  <?php } ?>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo MAIN; ?>Enterence/out" style="color: #FFFFFF!important;">Sign Out</a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>

        <div id="wrapper">
            <div id="navigation">
                <div id="interactors" style="margin-top: 16px;">
                    <!-- buttons and search -->
                     <?php if(!empty($courses)){ ?>
                      <a href="<?php echo MAIN; ?>Posts/add_post" class="btn">New Post</a>
                    <?php }?>
                    
                    <h1 style="padding-top: 13px; font-size: 2.00rem; text-align: center;">Posts</h1>
                </div>

                <div id="left-pane" style="overflow-y: scroll;" >
                    <hr class="rounded">
                    <?php foreach ($posts as $post) { ?>
                        <div class="card" style="width: auto;">
                          <div class="card-body" style="background-color: #ecf0f1;">
                            <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
                            <p class="card-text"><?php echo $post['post_short_desc']; ?></p>
                            <a href="<?php echo MAIN; ?>Posts/show_post/<?php echo $post['post_id']; ?>" class="card-link">See Post</a>
                            <?php if( $post['post_student_id'] == $added_id || $type === 'teacher'){ ?>
                                <a href="<?php echo MAIN; ?>Posts/delete_post/<?php echo $post['post_id']; ?>" class="card-link">Delete Post</a>
                            <?php } ?>
                          </div>
                        </div>
                        <hr class="rounded">
                    <?php } ?>
                </div>
            </div>

            <div id="right-pane">
                <?php $this->load->view("subviews/".$subview); ?>
            </div>
        </div>

        <?php $this->load->view("containers/foot"); ?>
        
    </body>
</html>
