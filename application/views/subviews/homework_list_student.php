<p class="card-description" style="font-size:30px"><b> My Homeworks</b> </p>
                    
                    <br>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Homework Name</th>
                          <th>Homework Resource</th>
                          <th>Detail</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                          <?php foreach ($homeworks as $homework){ ?>
                          <tr>
                            <td><?php echo $homework['homework_short_desc']; ?></td> 
                            <td><a href="<?php echo $homework['resource_file']; ?>"><?php echo $homework['resource_file']; ?></a></td>
                            <td><a href="<?php echo MAIN; ?>Student_homework/detail_homework/<?php echo $homework['homework_id']; ?>">Detail</a></td>
                            
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>
