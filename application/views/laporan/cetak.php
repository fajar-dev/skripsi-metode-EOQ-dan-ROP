<?php $jj=$this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title></title>
    <link href="<?php echo base_url()?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">

</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="invoice-title">
					Logo
				</div>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Laporan <?php if($jj=='persediaan'){ echo "Persediaan"; } else if ($jj=='pemesanan') { echo "Pemesanan"; } else { echo "Permintaan"; } ?></strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php  if($jj=='persediaan'){?>
								<table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Kode</th>
											<th>Nama</th>
											<th>EOQ</th>
											<th>ROP</th>
											<th>Safety Stock</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=0;
										foreach ($persediaan->result_array() as $i) :
											$no++;
											?>
											<tr>
												<td><?php echo $i['produk_kode']; ?></td>
												<td><?php echo $i['produk_nama']; ?></td>
												<td><?php echo $i['persediaan_eoq']; ?></td>
												<td><?php echo $i['persediaan_rop']; ?></td>
												<td><?php echo $i['persediaan_ss']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($i['persediaan_tanggal'])); ?></td>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							<?php } else if ($jj=='pemesanan') {?>
								<table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Kode</th>
											<th>Nama</th>
											<th>Tanggal</th>
											<th>Jumlah</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=0;
										foreach ($pemesanan->result_array() as $i) :
											$no++;
											?>
											<tr>
												<td><?php echo $i['produk_kode']; ?></td>
												<td><?php echo $i['produk_nama']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
												<td><?php echo $i['pemesanan_jumlah']; ?></td>
												<td class="text-center">
													<?php
													if($i['pemesanan_status']=='selesai'){
														echo '<span class="text-success">'.$i['pemesanan_status'].'</span>';
													}else if($i['pemesanan_status']=='batal'){
														echo '<span class="text-danger">'.$i['pemesanan_status'].'</span>';
													} else {
														echo '<span class="text-info">'.$i['pemesanan_status'].'</span>';
													}
													?>
												</td>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							<?php } else {?>
								<table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Produk</th>
											<th>Supplier</th>
											<th>Jumlah</th>
											<th>Biaya Total</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=0;
										foreach ($permintaan->result_array() as $i) :
											$no++;
											?>
											<tr>
												<td><?php echo $i['produk_kode']; ?></td>
												<td><?php echo $i['supplier_nama']; ?></td>
												<td><?php echo number_format($i['permintaan_jumlah']); ?></td>
												<td><?php echo "Rp. ".number_format($i['permintaan_biaya']); ?></td>
												<td><?php echo date('d-m-Y',strtotime($i['permintaan_tanggal'])); ?></td>

											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>


			</div>
		</div>

	</div>
</body>
</html>