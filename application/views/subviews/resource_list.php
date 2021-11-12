      <p class="card-description" style="font-size:30px"><b> Resources</b> </p>
                    <?php if(empty($courses)){ ?>
                      <p class="card-description" style="font-size:20px"><b> YOU DON'T HAVE ANY COURSES PLEASE ADD A COURSE </b> </p>
                    <?php }else{ ?>
                     <div style="margin-bottom: 30px;">
                      <a href="<?php echo MAIN; ?>Teacher_resource/add_resource" >Add Resource</a>
                    </div>
                    <?php  } ?>
                   
                    
                     <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Resource Name</th>
                          <th>Resource File</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                          <?php foreach ($resources as $resource){ ?>
                          <tr>
                            <td><?php echo $resource['resource_short_desc']; ?></td>
                            <td><a href="<?php echo $resource['resource_url']; ?>"><?php echo $resource['resource_url']; ?></a></td>
                            <td><a href="<?php echo MAIN; ?>Teacher_resource/update_resource/<?php echo $resource['resource_id']; ?>">Update</a></td>
                            <td><a href="<?php echo MAIN; ?>Teacher_resource/delete_resource/<?php echo $resource['resource_id']; ?>">Delete</a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>