<div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          <div class="col-sm-12">
          <?php echo form_open('belanja/update'); ?>

<table class="table" cellpadding="6" cellspacing="1" style="width:100%">

<tr>
        <th width="85px">QTY</th>
        <th>Nama Barang</th>
        <th style="text-align:left" >Berat Barang</th>
        <th style="text-align:left">Harga</th>
        <th style="text-align:left">Sub-Total</th>
        <th class="text-center">Action</th>
</tr>

<?php $i = 1; ?>

<?php 
$tot_berat = 0;
foreach ($this->cart->contents() as $items) { 
         $barang = $this->m_home->detail_barang($items['id']);
         $berat = $items['qty'] * $barang->berat;
         $tot_berat = $tot_berat + $berat;
?>

       

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => 0, 'size' => '5', 'type'=>'number', 'class'=>'form-control')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                </td>
                <td><?= $berat ?> Gr</td>
                <td style="text-align:left">Rp. <?php echo number_format($items['price'], 0); ?>,-</td>
                <td style="text-align:left">Rp. <?php echo number_format($items['subtotal'],0 ); ?>,-</td>
                <td class="text-center">
                    <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
        </tr>

<?php $i++; ?>

<?php } ?>


<tr>
<td colspan="2" class="right"><strong>Total</strong></td>
       <td colspan="2"><strong> <?= $tot_berat ?> Gr</strong></td>
        
        <td class="right"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?>,-</strong></td>
</tr>

</table>

<div class="row">
    <div class="col-sm-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
        <a href="<?= base_url('belanja/clear') ?>" class="btn btn-success"><i class="fa fa-trash"></i> Clear All</a>
    </div>
</div>
<?php 
form_close();
 ?>
<br>
          </div>
        </div>
        </div>
</div>