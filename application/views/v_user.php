<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <button  data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add</button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php 
              if ($this->session->flashdata('pesan'))
              {
                # code...
                echo '                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
              }
              
              
              ?>
                <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level User</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1 ;
                        foreach ($user as $key => $value) { ?>
                           
                        
                        <tr>
                            <td class="text-center"><?= $no++ ;?></td>
                            <td class="text-center"><?= $value->nama_user;?></td>
                            <td class="text-center"><?= $value->username;?></td>
                            <td class="text-center"><?= $value->password;?></td>
                            <td class="text-center"><?php
                                if ($value->level_user == 1) {
                                    echo '<span class="badge bg-primary">Admin</span>';
                                }else{
                                    echo '<span class="badge bg-success">User</span>';
                                }
                            ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit <?= $value->id_user ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                  <?php  } ?>


                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

<!-- modal add -->
          <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <!-- form -->
            <?php 
              echo form_open('user/add');             
            ?>

            <!-- desain formdi tengah -tengah -->
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama user" required>
                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                    <label>Level User</label>
                   <select name="level_user" class="form-control">
                    <option value="1" selected>Admin</option>
                    <option value="2">User</option>
                   </select>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php 
              echo form_close();             
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




        <!-- modal edit -->
        <?php
        foreach ($user as $key => $value) { ?>

          <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <!-- form -->
            <?php 
              echo form_open('user/edit/' . $value->id_user);             
            ?>

            <!-- desain formdi tengah -tengah -->
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama_user" value="<?= $value->nama_user ?>" placeholder="Nama user" required>
                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $value->username ?>" placeholder="Username" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $value->password ?>" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                    <label>Level User</label>
                   <select name="level_user" class="form-control">
                    <option value="1" selected>Admin</option>
                    <option value="2">User</option>
                   </select>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php 
              echo form_close();             
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>