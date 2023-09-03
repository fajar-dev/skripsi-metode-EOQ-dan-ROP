  <div class="right_col" role="main" style="color: black !important;">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Laporan</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Persediaan</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pemesanan</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Permintaan</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url()?>cetak/persediaan" target="_blank" class="btn btn-primary" ><i class="fa fa-print"></i> Cetak Laporan</a></li>
                  </ul>
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
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                 <ul class="nav navbar-right panel_toolbox">
                  <li><a href="<?php echo base_url()?>cetak/pemesanan" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan</a></li>
                </ul>
                <table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Status</th>
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
                            echo '<span class="label label-success">'.$i['pemesanan_status'].'</span>';
                          }else if($i['pemesanan_status']=='batal'){
                            echo '<span class="label label-danger">'.$i['pemesanan_status'].'</span>';
                          } else {
                            echo '<span class="label label-info">'.$i['pemesanan_status'].'</span>';
                          }
                          ?>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
               <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?php echo base_url()?>cetak/permintaan" target="_blank"><i class="fa fa-print"></i> Cetak Laporan</a></li>
              </ul>
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
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
</div>
</div>


