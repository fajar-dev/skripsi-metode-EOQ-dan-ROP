  <div class="right_col" role="main">
  	<div class="">
  		<div class="clearfix"></div>
  		<div class="row">
  			<div class="col-md-12 col-sm-12 col-xs-12">
  				<div class="x_panel">
  					<div class="x_title">
  						<h2>Bahan</h2>
  						<ul class="nav navbar-right panel_toolbox">
  							<li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Bahan</a></li>
  						</ul>
  						<div class="clearfix"></div>
  					</div>
  					<div class="x_content">
  						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  							<thead>
  								<tr>
  									<th>Kode</th>
  									<th>Nama</th>
  									<th>Jumlah</th>
  									<th>Satuan</th>
  									<th class="text-center">Aksi</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php
  								$no=0;
  								foreach ($data->result_array() as $i) :
  									$no++;
  									?>
  									<tr>
  										<td><?php echo $i['bb_kode']; ?></td>
  										<td><?php echo $i['bb_nama']; ?></td>
  										<td><?php echo $i['bb_jumlah']; ?></td>
  										<td><?php echo $i['bb_satuan']; ?></td>
  										<td  class="text-center">
  											<a class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit<?php echo $i['bb_kode'];?>">Edit</a>
  											<a class="btn btn-primary" data-toggle="modal" data-target="#ModalHapus<?php echo $i['bb_kode'];?>">Hapus</a>
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


  <div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">

  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
  				</button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Bahan</h4>
  			</div>
  			<div class="modal-body">
  				<div class="fetched-data">
  					<form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_bahan" method="POST" enctype="multipart/form-data">
  						<?php
  						$cek=$data->num_rows()+1;
  						$kd='BB0';
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
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bahan</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<input type="text" name="nama" class="form-control">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<input type="number" name="jumlah" class="form-control">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<select name="satuan" class="form-control">
                    <option value="lembar">Lembar</option>
  									<option value="buah">Buah</option>
  								</select>
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

  	<div class="modal fade" id="ModalEdit<?php echo $i['bb_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-lg" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
  					<h4 class="modal-title" id="myModalLabel">Edit Bahan</h4>
  				</div>
  				<form class="form-horizontal" action="<?php echo base_url().'padmin/update_bahan'?>" method="post" enctype="multipart/form-data">
  					<div class="modal-body">       
  						<input type="hidden" name="kode" value="<?php echo $i['bb_kode'];?>"/> 
  				
  						<div class="form-group">
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bahan</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<input type="text" name="nama" value="<?php echo $i['bb_nama'];?>" class="form-control">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<input type="number" name="jumlah" value="<?php echo $i['bb_jumlah'];?>" class="form-control">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
  							<div class="col-md-9 col-sm-9 col-xs-12">
  								<select name="satuan" class="form-control">
                    <option value="lembar" <?php if($i['bb_satuan']=='lembar') {echo "selected";} else {} ?>>Lembar</option>
  									<option value="buah" <?php if($i['bb_satuan']=='buah') {echo "selected";} else {} ?>>Buah</option>
  								</select>
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
  	<div class="modal fade" id="ModalHapus<?php echo $i['bb_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
  					<h4 class="modal-title" id="myModalLabel">Hapus Bahan</h4>
  				</div>
  				<form class="form-horizontal" action="<?php echo base_url().'padmin/delete_bahan'?>" method="post" enctype="multipart/form-data">
  					<div class="modal-body">       
  						<input type="hidden" name="kode" value="<?php echo $i['bb_kode'];?>"/> 
  						<p>Apakah Anda yakin mau menghapus Bahan <b><?php echo $i['bb_nama'];?></b> ?</p>

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

