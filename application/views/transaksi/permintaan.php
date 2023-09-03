  <div class="right_col" role="main" style="color: black !important;">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>permintaan</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-dark" style="color: white !important;" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah permintaan</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                  foreach ($data->result_array() as $i) :
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


  <div class="modal fade bs-example-modal-lg" style="color: black !important;" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah permintaan</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data">
            <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_permintaan" method="POST" enctype="multipart/form-data">
              <?php
              $cek=$data->num_rows()+1;
              $kd='PM0';
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="produk" class="form-control">
                    <?php foreach ($produk->result_array() as $i) : ?>
                      <option value="<?php echo $i['produk_kode']; ?>"><?php echo $i['produk_nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="supplier" class="form-control">
                    <?php foreach ($supplier->result_array() as $j) : ?>
                      <option value="<?php echo $j['supplier_id']; ?>"><?php echo $j['supplier_nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="number" name="jumlah" class="form-control">
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

