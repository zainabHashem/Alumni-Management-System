<?php
require_once'../../Models/alumni.php';
require_once'../../Models/user.php';
require_once'../../Controllers/Admin2Controller.php';
 
$admin=new AdminController;
$alumnilist=$admin->getAlumni();
$errMsg="";
$alumni=new alumni;

if(isset($_POST['nationalid'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['Department'])&&isset($_POST['Graduationyear']))
{
 if(!empty($_POST['nationalid'])&& !empty($_POST['name'])&& !empty($_POST['email'])&& !empty( $_POST['Department']) &&!empty($_POST['Graduationyear']))
{
   
    $alumni->setnationalid($_POST['nationalid']);
    $alumni->setFirstName($_POST['name']);
    $alumni->setEmail($_POST['email']);
    $alumni->setDepartment($_POST['Department']);
    $alumni-> setGraduateYear($_POST['Graduationyear']);
    if ($admin->addalumni($alumni)) {
      header( "location : alumnilist.php");
    }
    else {
    $errMsg="something went wrong";
    }
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Alumni</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>
</head>
<body>
<?php include( '../Layout/adminheader.php'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Admin/AlumniList.php">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Alumni</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="AddAlumni.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="name" name="name" class="form-control" id="" placeholder="Enter name of alumni">
              
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Nationalid</label>
                    <input type="number" name="nationalid" class="form-control" id="" placeholder="Enter nationalid">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Department</label>
                
                 <div class="form-group">
                    
                    <select class="form-control" name="Department"> 

                      <option value="">choose your Department</option> 
                      <option value="is">is</option>
                      <option value="cs">cs</option>
                      <option value="it">it</option>
                      <option value="ai">ai</option>
                    </select>
                  </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Graduation year</label>
                    <!--input type="number" class="form-control" id="" placeholder="Enter Graduation year"-->
                    <div class="form-group"> 
                        <select class="form-control" name="Graduationyear">
                            <option value="">Choose your Graduation year</option>
                          
                            <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                        </select>
                      </div>
                    </div>

                </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <!--div class="card-footer"-->
             
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
            </section>
    <!-- /.content -->
  </div>
     
<!-- Layout js -->
<script src="../Layout/layout.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
<?php include ('../Layout/footer.php'); ?>
</html>
