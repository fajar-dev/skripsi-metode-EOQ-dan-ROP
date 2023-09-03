  <div class="right_col" role="main" style="color: black !important;">
  	<div class="">
  		<div class="clearfix"></div>
  		<div class="row">
  			<div class="col-md-12 col-sm-12 col-xs-12">
  				<div class="x_panel">
  					<div class="x_title">
  						<h2>Produk</h2>
  						<ul class="nav navbar-right panel_toolbox">
  							<li><a href="#myModaltambah" class="btn btn-dark" style="color: white !important;" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Produk</a></li>
  						</ul>
  						<div class="clearfix"></div>
  					</div>
  					<div class="x_content">
  						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  							<thead>
  								<tr>
  									<th>Kode</th>
  									<th>Nama</th>
                    <th>Kategori</th>
  									<th>Harga</th>
  									<th>Stok</th>
  									<th>Biaya Pesan</th>
  									<th>Biaya Simpan</th>
                    <th>Lead Time</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($data->result_array() as $i) :
                   $no++;
                   $produk_kode=$i['produk_kode'];
                   ?>
                   <tr>
                    <td><?php echo $i['produk_kode']; ?></td>
                    <td><?php echo $i['produk_nama']; ?></td>
                    <td><?php echo $i['kategori_nama']; ?></td>
                    <td>Rp. <?php echo number_format($i['produk_harga']); ?></td>
                    <td><?php echo number_format($i['produk_stok']); ?></td>
                    <td>Rp. <?php echo number_format($i['produk_bpesan']); ?></td>
                    <td><?php echo $i['produk_bsimpan']."%"; ?></td>
                    <td><?php echo $i['produk_leadtime']; ?></td>
                    <td>
                      <?php 
                      $cc=$this->m_padmin->get_persediaan_by_kode($produk_kode);
                      $dd=$cc->row_array();
                        if($i['produk_stok']<=$dd['persediaan_rop'] && $i['produk_stok']>=$dd['persediaan_ss']){
                          echo '<span class="label label-info">Persediaan memasuki ROP</span>';
                        } else if ($i['produk_stok']<=$dd['persediaan_ss'] && $i['produk_stok']>0){
                          echo '<span class="label label-warning">Persediaan dibawah SS</span>';
                        } else if ($i['produk_stok']==0){ 
                          echo '<span class="label label-danger">Stok habis</span>';
                        } else {
                          echo '<span class="label label-success">Stok aman</span>';
                        }
                      ?>
                    </td>
                    <td  class="text-center">
                     <div class="btn-group">
                      <button type="button" class="btn btn-danger">Action</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <span class="caret"></span>
                       <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <ul class="dropdown-menu" role="menu">
                       <li><a href="<?php echo base_url()?>produk/detail/<?php echo $i['produk_kode']; ?>">Detail Produk</a>
                       </li>
                       <li class="divider"></li>
                       <li>
                        <a data-toggle="modal" data-target="#ModalEdit<?php echo $i['produk_kode'];?>">Edit</a>
                      </li>
                      <li>
                        <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['produk_kode'];?>">Delete</a>
                      </li>
                    </ul>
                  </div>

                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="modal fade bs-example-modal-lg" style="color: black !important;" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">

   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
  </div>
  <div class="modal-body">
    <div class="fetched-data">
     <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_produk" method="POST" enctype="multipart/form-data">
      <?php
      $cek=$data->num_rows()+1;
      $kd='BR0';
      $rn=rand(0,999);
      $date=date('Ymd');
      $nrn=rand(0,10);
      $newkode=$kd.$cek.$date.$nrn;
      ?>
      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode</label>
       <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="kode" value="<?php echo $newkode; ?>" readonly="readonly" class="form-control">
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
     <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text" name="nama" class="form-control">
    </div>
  </div>

  <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
     <div class="col-md-9 col-sm-9 col-xs-12">
      <select type="text" name="kat" class="form-control">
        <?php
          foreach ($kat->result_array() as $i) :
        ?>
        <option value="<?= $i['id_kategori'] ?>"><?= $i['kategori_nama'] ?></option>
        <?php endforeach;?>
      </select>
    </div>
  </div>

  <div class="form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
   <div class="col-md-9 col-sm-9 col-xs-12">
    <input type="number" name="harga" class="form-control">
  </div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="stok" class="form-control">
</div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pemesanan</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="bpesan" class="form-control">
</div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Penyimpanan (%)</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="bsimpan" class="form-control">
</div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Lead Time</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="leadtime" class="form-control">
</div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
 <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>


<?php foreach ($data->result_array() as $i) :  ?>

 <div class="modal fade" style="color: black !important;" id="ModalEdit<?php echo $i['produk_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
     <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'padmin/update_produk'?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">       
      <input type="hidden" name="kode" value="<?php echo $i['produk_kode'];?>"/> 

      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
       <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="nama" value="<?php echo $i['produk_nama'];?>" class="form-control">
      </div>
    </div>

    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
     <div class="col-md-9 col-sm-9 col-xs-12">
      <select type="text" name="kat" class="form-control">
        <?php
          foreach ($kat->result_array() as $a) :
        ?>
        <option value="<?= $a['id_kategori'] ?>"><?= $a['kategori_nama'] ?></option>
        <?php endforeach;?>
      </select>
    </div>
  </div>

    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
     <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="number" name="harga" value="<?php echo $i['produk_harga'];?>" class="form-control">
    </div>
  </div>

  <div class="form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok</label>
   <div class="col-md-9 col-sm-9 col-xs-12">
    <input type="number" name="stok" value="<?php echo $i['produk_stok'];?>" class="form-control" readonly>
  </div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pemesanan</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="bpesan" value="<?php echo $i['produk_bpesan'];?>" class="form-control">
</div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Penyimpanan (%)</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="bsimpan" value="<?php echo $i['produk_bsimpan'];?>" class="form-control">
</div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12">Lead Time</label>
 <div class="col-md-9 col-sm-9 col-xs-12">
  <input type="number" name="leadtime" value="<?php echo $i['produk_leadtime'];?>" class="form-control">
</div>
</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
</div>
</form>
</div>
</div>
</div>
<?php endforeach;?>


<?php foreach ($data->result_array() as $i) :
 ?>
 <div class="modal fade" style="color: black !important;" id="ModalHapus<?php echo $i['produk_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
     <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_produk'?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">       
      <input type="hidden" name="kode" value="<?php echo $i['produk_kode'];?>"/> 
      <p>Apakah Anda yakin mau menghapus Produk <b><?php echo $i['produk_nama'];?></b> ?</p>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
    </div>
  </form>
</div>
</div>
</div>
<?php endforeach;?>

