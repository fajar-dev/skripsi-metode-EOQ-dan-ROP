<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2 class="text-black" style="color: black !important;">Home</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php if($_SESSION['user_role']=='admin') {?>
						<div class="row top_tiles" style="color: black !important; background-color: white !important">
							<div class="col-md-8">
								<div class="bg-light">
									<div class="jumbotron" style="color: black !important; background-color: white !important">
										<h1>Hello, <?php echo $_SESSION['user_nama']; ?>!</h1>
										<p class="font-weight-bold"  style="color: black !important;">Anda memiliki <span class="label label-info"><?php echo $pempending['pempending']; ?></span> pemesanan yang membutuhkan konfirmasi.
											<div class=""><a href="<?php echo base_url(); ?>pemesanan" class="btn btn-primary">Konfirmasi Pemesanan</a></div>
										</p>

									</div>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-check"></i></div>
									<div class="count"><?php echo $pemselesai['pemselesai']; ?></div>
									<p>Pemesanan Berhasil</p>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-times"></i></div>
									<div class="count"><?php echo $pembatal['pembatal']; ?></div>
									<p>Pemesanan Batal</p>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if($_SESSION['user_role']=='admin' || $_SESSION['user_role']=='pimpinan') {?>
						<div class="row top_tiles " style="color: black !important; background-color: white !important">
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-list"></i></div>
									<div class="count"><?php echo $cprod['cproduk']; ?></div>
									<p>Total Produk</p>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-arrow-down"></i></div>
									<div class="count"><?php echo $cperm['cpermintaan']; ?></div>
									<p>Total Permintaan</p>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-arrow-up"></i></div>
									<div class="count"><?php echo $cpem['cpemesanan']; ?></div>
									<p>Total Pemesanan</p>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>


	</div> 



	<div class="row" style="color: black !important; background-color: white !important">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Pemesanan</small></h2>
					<div class="filter">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div id="chart_div" style="width: 100%; height: 500px;"></div>
					</div>

					<div class="col-md-3 col-sm-12 col-xs-12">
						<div>
							<div class="x_title">
								<h2>5 Pemesanan Terakhir</h2>
								<div class="clearfix"></div>
							</div>
							<ul class="list-unstyled top_profiles scroll-view">
								<?php foreach ($l5pem as $i) :  ?>
									<li class="media event">
										<a class="pull-left border-aero profile_thumb">
											<i class="fa fa-user aero"></i>
										</a>
										<div class="media-body">
											<a class="title" href="#"><?php echo $i['produk_kode']; ?></a>
											<p><strong><?php echo date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></strong> 
												<?php
												if($i['pemesanan_status']=='selesai'){
													echo '<span class="label label-success">'.$i['pemesanan_status'].'</span>';
												}else if($i['pemesanan_status']=='batal'){
													echo '<span class="label label-danger">'.$i['pemesanan_status'].'</span>';
												} else {
													echo '<span class="label label-info">'.$i['pemesanan_status'].'</span>';
												}
												?>
											</p>
											<p> <small><?php echo $i['pemesanan_jumlah']; ?> Jumlah Pemesanan</small>
											</p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Tanggal', 'Jumlah'],
			<?php foreach($chartpemesanan as $i) : ?>
				['<?php echo date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?>',  <?php echo $i['pemesanan_jumlah']; ?>],
			<?php endforeach; ?>
			]);

		var options = {
			title: 'Grafik Pemesanan',
			hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
			vAxis: {minValue: 0}
		};

		var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
</script>

