  <?php $cc=$data->row_array(); ?>
  <div class="right_col" role="main">
  	<div class="">
  		<div class="clearfix"></div>
  		<div class="row">



        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
          <div class="x_panel">
            <div class="x_title">
              Detail Produk
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="bs-example" data-example-id="simple-jumbotron">

                <div class="col-md-6 ">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Kode Produk</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_kode']; ?></h4>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Nama Produk</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_nama']; ?></h4>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Harga Produk</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_harga']; ?></h4>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Stock</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_stok']; ?></h4>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Biaya Pemesanan</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_bpesan']; ?></h4>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Biaya Penyimpanan</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_bsimpan']; ?></h4>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <h4>Lead Time</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4><?php echo $cc['produk_leadtime']; ?></h4>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="jumbotron">
                    <div class="row">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"></div>
                          <div class="count"><?php echo number_format($cc['persediaan_eoq'],0); ?></div>
                          <h3>EOQ</h3>
                          <p>Persediaan EOQ</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"></div>
                          <div class="count"><?php echo number_format($cc['persediaan_rop'],0); ?></div>
                          <h3>ROP</h3>
                          <p>Persediaan ROP</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"></div>
                          <div class="count"><?php echo number_format($cc['persediaan_ss'],0); ?></div>
                          <h3>SS</h3>
                          <p>Persediaan Safety Stock</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>






      </div>
    </div>
  </div>

