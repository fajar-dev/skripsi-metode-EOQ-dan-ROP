<div class="right_col" role="main" style="color: black !important;">
  	<div class="">
  		<div class="clearfix"></div>
  		<div class="row">
  			<div class="col-md-12 col-sm-12 col-xs-12">
  				<div class="x_panel">
  					<div class="x_title">
  						<h2>Kategori</h2>
  						<ul class="nav navbar-right panel_toolbox">
  							<li><a href="#myModaltambah" class="btn btn-dark bg-dark" style="color: white !important;" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Kategori</a></li>
  						</ul>
  						<div class="clearfix"></div>
  					</div>
  					<div class="x_content">
  						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  							<thead>
  								<tr>
  									<th>No</th>
                    <th>Kategori</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  foreach ($data->result_array() as $i) :
                   $produk_kode=$i['id_kategori'];
                   ?>
                   <tr>
                    <td><?= $no++ ?></td>
                    <td><?php echo $i['kategori_nama']; ?></td>
                    <td  class="text-center">
                     <div class="btn-group">
                      <button type="button" class="btn btn-danger">Action</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <span class="caret"></span>
                       <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <ul class="dropdown-menu" role="menu">
                       <li>
                        <a data-toggle="modal" data-target="#ModalEdit<?php echo $i['id_kategori'];?>">Edit</a>
                      </li>
                      <li>
                        <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['id_kategori'];?>">Delete</a>
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
    <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
  </div>
  <div class="modal-body">
    <div class="fetched-data">
     <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_kategori" method="POST" enctype="multipart/form-data">


    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="nama" class="form-control">
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

 <div class="modal fade" style="color: black !important;" id="ModalEdit<?php echo $i['id_kategori'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
     <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'padmin/update_kategori'?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">       
      <input type="hidden" name="kode" value="<?php echo $i['id_kategori'];?>"/> 

      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori</label>
       <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="nama" value="<?php echo $i['kategori_nama'];?>" class="form-control">
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
 <div class="modal fade" style="color: black !important;" id="ModalHapus<?php echo $i['id_kategori'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
     <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_kategori'?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">       
      <input type="hidden" name="kode" value="<?php echo $i['id_kategori'];?>"/> 
      <p>Apakah Anda yakin mau menghapus kategori <b><?php echo $i['kategori_nama'];?></b> ?</p>

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

