 <?php $cc=$guser->row_array(); ?>
 <div class="top_nav" style="background-color: #2A3F54 !important;">
  <div class="nav_menu" style="background-color: #2A3F54 !important;">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right" style="background-color: #2A3F54 !important; color: white !important;">
        <li class="" style="background-color: #D9DEE4 !important; color: white !important;">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url().'assets/images/'.$cc['user_foto'];?>" alt=""><?php echo $cc['user_nama']; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>