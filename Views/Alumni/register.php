<?php
require_once '../../Models/user.php';
require_once '../../Models/alumni.php';
require_once '../../Controllers/AuthController.php';


$errMsg="";
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['ssn']) && isset($_POST['password']) 
&& isset($_POST['gender']) && isset($_POST['department']) && isset($_POST['grad-year'])) 
{
  if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['ssn'])&& !empty($_POST['password']) 
 && !empty($_POST['gender']) && !empty($_POST['department']) && !empty($_POST['grad-year'])) 
  {




    $alumni=new Alumni;
    $auth=new AuthController;
    $alumni->setFirstName($_POST['firstname']);
    $alumni->setLastName($_POST['lastname']);
    $alumni->setEmail($_POST['email']);
    $alumni->setnationalid($_POST['ssn']);
    $alumni->setPassword($_POST['password']);
    $alumni->setgender($_POST['gender']);
    $alumni->setDepartment($_POST['department']);
    $alumni->setGraduateYear($_POST['grad-year']);
    

    
    if($auth->register($alumni))
    {
      header("location: ../Alumni/news.php");
    }
    else
    {
      $errMsg=$_SESSION["errMsg"];
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
  <title>Alumni | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page" 
style="background-image: url(&quot;../Images/Alumni.avif&quot;);  background-size: cover;">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><h1> Alumni SYSTEM </h1></a>
  </div>

  <div class="card" style=" border: 1px solid brown;">
    <div class="card-body register-card-body">
      <p class="login-box-msg"style="font-family: 'Poppins', sans-serif;
font-family: 'Roboto', sans-serif;">Register a new membership</p>
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
              <?php echo$errMsg="Please enter correct data !!! retype pass correctly & firstname dosent contain nums and greater than 6";?>
              <?php echo $errMsg ?>
              </div>
              
            
                  <?php
              }
            
            ?>
      <form action="register.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First name" name="firstname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last name" name="lastname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="SSN" class="form-control" placeholder="SSN" name="ssn">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="repassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
      <select id="select" name="gender" required 
      style=" width: 350px; height: 35px; text-align: center; border: 1px solid brown;">
      <option disabled selected>Gender</option>
      <option value ='male'>Male</option>							
			<option value ='female'>Female</option>
			</select>
      <div class="input-group-append">
          </div>
        </div>
        <div class="input-group mb-3">
        <select id="select" name="department" required 
         style=" width: 350px; height: 35px; text-align: center; border: 1px solid brown;">
				<option disabled selected>Department</option>	
        <optgroup label="General">						
				<option value ='CS'>CS</option>
				<option value ='AI'>AI</option>
				<option value ='IT'>IT</option>
				<option value ='IS'>IS</option>
        </optgroup>
        <optgroup label="Credit">
				<option value ='Software'>Software</option>
				<option value ='Medical'>Medical</option>
        </optgroup>
			</select>
      <div class="input-group-append">
          </div>
        </div>
        <div class="input-group mb-3">
      <select id="select" name="grad-year" required 
      style=" width: 350px; height: 35px; text-align: center; border: 1px solid brown;">
      <option disabled selected>Gradute year</option>
      <option vale ='2019'>2019</option>							
			<option value ='2020'>2020</option>
      <option value ='2021'>2021</option>
      <option value ='2022'>2022</option>
			</select>
      <div class="input-group-append">
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">sign up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="../Both/login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
