<?php
if(isset($_SESSION['logged_in'])){
  $user_id=$_SESSION['user_id'];
  $cgusr=$guser->row_array();
}
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url().'assets/images/'.$cgusr['user_foto'];?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $cgusr['user_nama']; ?></h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Main Menu</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> Home</a> </li>
                <?php
                if($_SESSION['user_role']=='admin'){
                  ?>
                  <li><a href="<?php echo base_url(); ?>kategori"><i class="fa fa-list"></i> Kategori</a> </li>
                  <li><a href="<?php echo base_url(); ?>produk"><i class="fa fa-list"></i> Produk</a> </li>
                  <?php 
                }
                 ?>
                 <li><a><i class="fa fa-shopping-cart"></i>Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url()?>pemesanan">Pemesanan</a></li>
                    <li><a href="<?php echo base_url()?>permintaan">Permintaan</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-line-chart"></i>Perankingan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <?php 
                		$q = $this->db->select('*')->from('kategori')->get();
                    $kat = $q->result_array();
                  ?>
                  <?php foreach ($kat as $data) { ?>
                    <li><a href="<?php echo base_url('ranking/'.$data['id_kategori'])?>"><?= $data['kategori_nama'] ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <?php
              if($_SESSION['user_role']=='admin'){
                ?>
                <li><a href="<?php echo base_url(); ?>laporan"><i class="fa fa-file-text-o"></i>Laporan</a> </li>
                <li><a href="<?php echo base_url(); ?>supplier"><i class="fa fa-truck"></i> Supplier</a> </li>
                <li><a href="<?php echo base_url(); ?>user"><i class="fa fa-user"></i>User</a> </li>
              <?php } ?>
              <?php   if($_SESSION['user_role']=='pimpinan'){ ?>

              <?php } ?>
            </div>

          </div>
        </div>
      </div>