<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Register</b> Pelanggan</a>
  </div>

<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi Pelangan Baru</p>

      <?php 
       echo validation_errors('<div class="alert alert-warning alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>');

       
      if ($this->session->flashdata('pesan')){
        # code...
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Suksess!!!</h5>';
        echo $this->session->flashdata('pesan');
        echo '</div>'; 
      }
      
      echo form_open('pelanggan/register'); ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="<?= set_value('nama_pelanggan') ?>" name="nama_pelanggan" placeholder="Nama Pelanggan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="<?= set_value('email') ?>" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="<?= set_value('password') ?>" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="<?= set_value('ulangi_password') ?>" name="ulangi_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close() ?>

      <a href="<?= base_url('pelanggan/login') ?>" class="text-center">Saya sudah punya akun!!!</a>
    </div>
    <!-- /.form-box -->
  </div>
</div>
</div>
<div class="col-sm-4"></div>
</div>