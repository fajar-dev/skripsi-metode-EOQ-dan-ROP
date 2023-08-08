<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Perankingan <?= $kat->kategori_nama ?></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">EOQ</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">ROP</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Rank</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>EOQ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      foreach ($eoq->result_array() as $i) :
                        ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?php echo $i['produk_kode']; ?></td>
                          <td><?php echo $i['produk_nama']; ?></td>
                          <td><?php echo $i['produk_harga']; ?></td>
                          <td><?php echo $i['max_eoq']; ?></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <table id="datatable-responsivee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Rank</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>ROP</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      foreach ($rop->result_array() as $i) :
                        ?>
                        <tr>
                        <td><?= $no++ ?></td>
                          <td><?php echo $i['produk_kode']; ?></td>
                          <td><?php echo $i['produk_nama']; ?></td>
                          <td><?php echo $i['produk_harga']; ?></td>
                          <td><?php echo $i['max_rop']; ?></td>
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
</div>


