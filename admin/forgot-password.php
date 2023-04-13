<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header2.php') ?>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
    body{
      background: url("https://wallpapers.com/images/hd/blank-white-landscape-7sn5o1woonmklx1h.jpg");
      background-size:cover;
      background-repeat:no-repeat;
    }
    #logo {
      background-size:cover;
      background-repeat:no-repeat;
    }
    #page-title{
      font-size: 3.5em;
      color: black !important;
    }
  </style>
  <div class="logo" id="logo"><img src="logo.jpg" alt="Pranish Inc. Logo"></div>
  <!-- <h1 class="text-center text-white px-4 py-5" id="page-title"><b>Pranish Inc.</b></h1> -->
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-blue my-2">
    <div class="card-body">
      <p class="login-box-msg">Please enter your email</p>
      <form id="forgot-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"><span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <input type="password" class="form-control"  name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-8">
            <a href="https://pranishincsystem.000webhostapp.com">Go to Website</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="login.php">Forgot Password</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>