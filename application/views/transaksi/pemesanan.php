  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Pemesanan</h2>
              <ul class="nav navbar-right panel_toolbox">
                <?php if($_SESSION['user_role']=='user'){ ?>
                  <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Pemesanan</a></li>
                <?php } ?>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th class="text-center">Status</th>
                    <?php if($_SESSION['user_role']=='admin'){ ?>
                      <th>Aksi</th>
                    <?php } ?>
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
                      <?php if($_SESSION['user_role']=='admin'){ ?>
                        <td>
                          <a href="#myModalacc<?php echo $i['pemesanan_id'];?>" class="btn btn-success" id="custId" data-toggle="modal" ><i class="fa fa-check"></i></a>
                          <a href="#myModaldec<?php echo $i['pemesanan_id'];?>" class="btn btn-danger" id="custId" data-toggle="modal" ><i class="fa fa-times"></i></a>
                        </td>
                        <?php } ?> 
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
          <h4 class="modal-title" id="myModalLabel">Tambah Pemesanan</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data">
            <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_pemesanan" method="POST" enctype="multipart/form-data">
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
                    <?php foreach ($produk->result_array() as $i) : 
                     $produk_kode=$i['produk_kode'];
                     $cc=$this->m_padmin->get_persediaan_by_kode($produk_kode);
                     $dd=$cc->row_array();
                     if($i['produk_stok']<=$dd['persediaan_rop']){ ?>
                      <option value="<?php echo $i['produk_kode']; ?>"><?php echo $i['produk_nama']; ?></option>
                    <?php } else {?> 
                    <?php }endforeach; ?>
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


  <?php foreach ($data->result_array() as $i) :  ?>

    <div class="modal fade" id="ModalEdit<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Pemesanan</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url().'padmin/update_pemesanan'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">       
              <input type="hidden" name="persediaan_id" value="<?php echo $i['persediaan_id']; ?>" class="form-control" readonly="readonly">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="kode" value="<?php echo $i['pemesanan_id']; ?>" class="form-control" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="produk" class="form-control">
                    <?php foreach ($produk->result_array() as $j) : ?>
                      <option value="<?php echo $i['produk_kode']; ?>" <?php if($i['produk_kode']==$j['produk_kode']) {echo "selected"; } else {}?>><?php echo $j['produk_nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="number" name="jumlah" value="<?php echo $i['pemesanan_jumlah']; ?>" class="form-control">
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
    <div class="modal fade" id="ModalHapus<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Pemesanan</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_pemesanan'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">       
              <input type="hidden" name="kode" value="<?php echo $i['pemesanan_id'];?>"/> 
              <p>Apakah Anda yakin mau menghapus Pemesanan <b><?php echo $i['produk_nama'];?></b> ?</p>

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


  <?php foreach ($data->result_array() as $i) :
    ?>
    <div class="modal fade" id="myModalacc<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Pemesanan</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url().'padmin/update_pemesanan_status'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">       
              <input type="hidden" name="kode" value="<?php echo $i['pemesanan_id'];?>"/> 
              <input type="hidden" name="jumlah" value="<?php echo $i['pemesanan_jumlah'];?>"/> 
              <input type="hidden" name="produk" value="<?php echo $i['produk_kode'];?>"/> 
              <input type="hidden" name="status" value="selesai"/> 
              <p>Apakah Anda yakin ingin mengkonfirmasi Pemesanan <b><?php echo $i['produk_nama'];?></b> ?</p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Konfirmasi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach;?>


  <?php foreach ($data->result_array() as $i) :
    ?>
    <div class="modal fade" id="myModaldec<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Batalkan Pemesanan</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url().'padmin/update_pemesanan_status'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">       
              <input type="hidden" name="kode" value="<?php echo $i['pemesanan_id'];?>"/> 
              <input type="hidden" name="jumlah" value="<?php echo $i['pemesanan_jumlah'];?>"/> 
              <input type="hidden" name="produk" value="<?php echo $i['produk_kode'];?>"/> 
              <input type="hidden" name="status" value="batal"/> 
              <p>Apakah Anda yakin ingin membatalkan Pemesanan <b><?php echo $i['produk_nama'];?></b> ?</p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Konfirmasi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach;?>

