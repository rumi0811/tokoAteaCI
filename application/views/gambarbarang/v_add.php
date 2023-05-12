<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Data Gambar Barang : <?= $barang->nama_barang ?></h3>

                <div class="card-tools">
                 
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

<?php 


// pesan error utuk gagal form kosong 
echo validation_errors('<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-info"></i>', '</h5> </div>');


// gagal upload gambar
if (isset($error_upload)) {
  echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
}
echo form_open_multipart('gambarbarang/add/' . $barang->id_barang) ?>



                      <!-- ngambil dari v add barang -->
                      <div class="row"> 

                      <!-- nambah kolom -->
                      <div class="form-group">
                        <label>Ket Gambar</label>
                        <input name="ket"  class="form-control" placeholder="Ket Gambar" value="<?= set_value('ket') ?>">
                      </div>

                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto Barang</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                    </div>
                    </div>
                      <!-- memunculkan image di samping file choosen -->
                    <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?=  base_url('assets/gambar/no-photo.png') ?>" id="gambar_load" width="200px">
                    </div>
                    </div>
                    </div>

                    <!-- copy paste tombol submit dari barang/v_add.php -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="<?= base_url('gambarbarang') ?>" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                    
                      <?php echo form_close() ?>

                      <!-- untuk memunculkan garis -->
                      <hr>
                      <div class="row">
                        <!-- melooping data -->
                        <?php foreach ($gambar as $key => $value) { ?>



                                                  <!-- copas dari atas -->
                        <div class="col-sm-3">
                    <div class="form-group">
                        <img src="<?=  base_url('assets/gambarbarang/' . $value->gambar) ?>" id="gambar_load" width="250px" height="250px">
                    </div>
                    <!-- memunculkan keterangan  -->
                    <p for=""><?= $value->ket ?></p>

                    <!-- menampilkan tombol, copas dari atas -->
                    <button data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" class="btn btn-danger btn-sx btn-block"> <i class="fas fa-trash"></i> Delete</button>
                    </div>
                      <?php } ?>   
                      
                      
                      </div>                   
                     
                <!-- <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama Barang</th>
                            <th>Cover</th>
                            <th>Jumlah Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php $no=1;
                      foreach ($gambarbarang as $key => $value) { ?>
                        <tr>
                            <td><?=  $no++;?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/gambar/') . $value->gambar ?>" width="100px"></td>
                            <td class="text-center"><span class="badge bg-primary"><?= $value->total_gambar ?></span></td>
                            <td class="text-center">
                              <a href="<?= base_url('gambarbarang/add/' . $value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Gambar</a>
                            </td>
                        </tr>
                     <?php } ?>                     
                    </tbody>

                </table> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
<!-- menambahkan function delete -->

                      <!-- modal dellete -->
                      <?php
        foreach ($gambar as $key => $value) { ?>

          <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->ket ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">

              <!-- menampilkan gambar sebelum dihapus biar mantap aja sih  -->
              <div class="form-group">
                        <img src="<?=  base_url('assets/gambarbarang/' . $value->gambar) ?>" id="gambar_load" width="250px" height="250px">
                    </div>
<h5>Apakah anda yakin ingin menghapus data ini? Coba pikirkan sekali lagi!</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('gambarbarang/delete/'. $value->id_barang . '/' . $value->id_gambar) ?>" class="btn btn-primary">Delete</a>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>


<!-- ngambil script dari v_add.php barang biar bisa load gambar -->

          <script>
    function bacaGambar(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function(){
        bacaGambar(this);

    });
</script>