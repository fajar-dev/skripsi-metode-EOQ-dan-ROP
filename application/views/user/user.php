  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>User</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah User</a></li>
              </ul>
              <div class="clearfix"></div>
              <div>
               <p><?php echo $this->session->flashdata('msg');?></p>
             </div>
           </div>
           <div class="x_content">
            <div class="table table-responsive">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Role</th>
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
                    <td  class="text-center"><img src="<?php echo base_url().'assets/images/'.$i['user_foto'];?>" width="50px"></td>
                    <td><?php echo $i['user_nama']; ?></td>
                    <td><?php echo $i['user_username']; ?></td>
                    <td><?php echo $i['user_email']; ?></td>
                    <td><?php echo $i['user_tel']; ?></td>
                    <td><?php echo $i['user_alamat']; ?></td>
                    <td><?php echo $i['user_role']; ?></td>
                    <td  class="text-center">
                     <a data-toggle="modal" data-target="#ModalEdit<?php echo $i['user_id'];?>"> <li class="fa fa-edit btn btn-primary"></li></a>
                     <a data-toggle="modal" data-target="#ModalEditPw<?php echo $i['user_id'];?>"> <li class="fa fa-key btn btn-warning"></li></a>
                     <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['user_id'];?>"> <li class="fa fa-trash btn btn-danger"></li></a>
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
</div>


<div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_user" method="POST" enctype="multipart/form-data">



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_username" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password" name="password" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Re-Password</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password" name="repassword" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_nama" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_email"  class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_tel"  class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" name="user_alamat"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="user_role" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" name="filefoto" class="form-control" required="required">
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

  <div class="modal fade" id="ModalEdit<?php echo $i['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit User</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_user'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="hidden" name="jenis" value="bio" readonly="readonly" class="form-control"> 
                <input type="hidden" name="kode" value="<?php echo $i['user_id'];?>" readonly="readonly" class="form-control"> 
                <input type="text"  name="user_username" value="<?php echo $i['user_username'];?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_nama" value="<?php echo $i['user_nama'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_email" value="<?php echo $i['user_email'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text"  name="user_tel" value="<?php echo $i['user_tel'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" name="user_alamat"><?php echo $i['user_alamat'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="user_role" class="form-control">
                  <option value="admin" <?php if($i['user_role']=='admin'){echo "selected";} else {}?>>Admin</option>
                  <option value="user" <?php if($i['user_role']=='user'){echo "selected";} else {}?>>User</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" name="filefoto" class="form-control">
                <span>*Kosongkan jika tidak ingin mengganti foto</span>
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


<?php foreach ($data->result_array() as $i) :  ?>

  <div class="modal fade" id="ModalEditPw<?php echo $i['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_password'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Lama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="hidden" name="kode" value="<?php echo $i['user_id'];?>" readonly="readonly" class="form-control"> 
                <input type="password"  name="oldpassword" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password"  name="newpassword" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Repassword</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password"  name="repassword" class="form-control">
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
  <div class="modal fade" id="ModalHapus<?php echo $i['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_user'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['user_id'];?>"/> 
           <p>Apakah Anda yakin mau menghapus User <?php echo $i['user_nama']; ?> ?</p>

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
