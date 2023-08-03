
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url()?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url()?>assets/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url()?>assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url()?>assets/backend/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url()?>assets/backend/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div>
     <p><?php echo $this->session->flashdata('msg');?></p>
   </div>
   <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">

        <form action="<?php echo base_url().'loginadmin/reg'?>" method="POST">
          <h1>Register</h1>
          <div>
            <input type="text" class="form-control" placeholder="Name" name="name" required="" />
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Email" name="email" required="" />
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Telp" name="telp" required="" />
          </div>
          <div>
            <input type="text" class="form-control" placeholder="address" name="address" required="" />
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Username" name="user_username" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" name="user_password" required="" />
          </div>
          <div>
            <button type="submit" value="Login" class="btn btn-primary btn-block" >Register</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">


            <div class="clearfix"></div>
            <br />

            <div>
              <p>Sudah memiliki akun? <a href="<?php echo base_url().'loginadmin'?>" class="text-primary">Login</a></p>
            </div>
          </div>
        </form>
      </section>
    </div>

  </div>
</div>
</body>
</html>
