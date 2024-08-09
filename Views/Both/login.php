<?php 
require_once '../../Models/user.php';
require_once '../../Controllers/AuthController.php';
$errMsg="";

if(isset($_GET["logout"]))
{
  session_start();
  session_destroy();
}
if(isset($_POST['email']) && isset($_POST['password']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']) )
    {   
        $user=new User;
        $auth=new AuthController;
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        
        if(!$auth->login($user))
        {
            if(!isset($_SESSION["userId"]))
            {
                session_start();
            }
            $errMsg=$_SESSION["errMsg"];
        }
        else
        {
            if(!isset($_SESSION["userId"]))
            {
                session_start();
            }
            if($_SESSION["userRole"]=="Admin")
            {
                header("location: ../Admin/AlumniList.php");
            }
            else
            {
                header("location: ../Alumni/news.php");
            }

        }

        
    }
    else
    {
        $errMsg="Please fill all fields";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alumni | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css"> 
</head>
<body class="hold-transition login-page" style="background-image: url(&quot;../Images/Alumni.avif&quot;); 
 background-size: cover;">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><h1>Alumni SYSTEM</h1></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style=" border: 1px solid brown;">
    <div class="card-body login-card-body">
      <p class="login-box-msg"  style="font-family: 'Poppins', sans-serif;
font-family: 'Roboto', sans-serif;">Sign in to start your session</p>

<?php 
              
              if($errMsg!="")
              {
                  ?>

              <div class="card-header">

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="color:red;">
              <?php echo $errMsg ?>
              </div>
              
            
                  <?php
              }
            
            ?>

      <form action="login.php" method="post"  id="formAuthentication">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="email" required id="email"
                    name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="password" required   id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="terms" id="remember" class="custom-control-input">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      
      </p>
      <p class="mb-0">
        <a href="../Alumni/register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
