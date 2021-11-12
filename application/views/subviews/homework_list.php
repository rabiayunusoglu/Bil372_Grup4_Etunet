<p class="card-description" style="font-size:30px"><b> Homeworks</b> </p>
                   <?php if(empty($courses)){ ?>
                      <p class="card-description" style="font-size:20px"><b> YOU DON'T HAVE ANY COURSES PLEASE ADD A COURSE </b> </p>
                    <?php }else{ ?>
                    <div style="margin-bottom: 30px;">
                      <a href="<?php echo MAIN; ?>Teacher_homework/add_homework" >Add Homework</a>
                    </div>
                  <?php } ?>
                    
                     <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Homework Name</th>
                          <th>Homework Resource</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                          <?php foreach ($homeworks as $homework){ ?>
                          <tr>
                            <td><?php echo $homework['homework_short_desc']; ?></td> 
                            <td><a href="<?php echo $homework['resource_file']; ?>"><?php echo $homework['resource_file']; ?></a></td>
                            <td><a href="<?php echo MAIN; ?>Teacher_homework/update_homework/<?php echo $homework['homework_id']; ?>">Update</a></td>
                            <td><a href="<?php echo MAIN; ?>Teacher_homework/delete_homework/<?php echo $homework['homework_id']; ?>">Delete</a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>