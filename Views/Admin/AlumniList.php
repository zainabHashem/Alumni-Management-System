<?php
require_once '../../Controllers/Admin2Controller.php';
$AdminController = new AdminController;
$Alumni = $AdminController->getAlumni();
$Alumni = $AdminController->getAlumni();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  if (!empty($_POST['alumniid'])) {

    $alumni= new Alumni;
    $alumni->setnationalid($_POST['alumniid']);
    if ($AdminController->deleteAlumni($alumni)) {
      $alumni = $AdminController->getAlumni();
    } else {
      $errMsg = "Something wrong Try Again";
    }

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alumni List</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>

</head>
<body >
<?php include( '../Layout/adminheader.php'); ?>

    <!-- Preloader -->
    
                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-15">
                        <div style="width: 1200px" class="card">
                          <div class="card-header">
                            <h3 class="card-title">Almuni list</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="width:10px">ID</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Graduation Year</th>
                                  <th style="width: 30px">Department</th>
                                  <th style="width: 40px">view</th>
                                  <th style="width: 40px">delete</th>
                                </tr>
                              </thead>
                              <?php
                              if (count($Alumni) == 0) {
                                ?>
                                <tbody>
                                  <tr>There are no Alumni yet !</tr>
                                </tbody>
                                <?php
                              } else {
                                foreach ($Alumni as $alumni) {
                                  ?>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $alumni["nationalid"] ?></td>
                                      <td><?php echo $alumni["name"] ?></td>
                                      <td><?php echo $alumni["email"] ?></td>
                                      <td><?php echo $alumni["Department"] ?></td>
                                      <td><?php echo $alumni["Graduationyear"] ?></td>
                                      <td>
                                      <button onclick="window.location.href='profile.php';" button type="submit"
                                          class="btn btn-primary">View Alumni</button> <br> <br>
                                      </td>
                                      <td>
                                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="alumniid" value="<?php echo $alumni["nationalid"];  ?>"> <!--hidden->to make not appear as label in table-->
                                    
                               <button class="btn btn-primary" type="sumbit" name="delete">Delete Alumni</button>

                                  </form>
                                </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <?php
                              }
                              ?>
                            </table>
                            </table>
                          </div>
                          <!-- /.card -->
                          <!-- /.content-wrapper -->
                          <!-- Control Sidebar -->
                          <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                          </aside>
                          <!-- /.control-sidebar -->
                        </div>
                        <button onclick="window.location.href='AddAlumni.php';" button type="submit"
                          class="btn btn-primary">Add Alumni </button>
                        <br><br>
                      </div>
                    </div>
                  </div>
                </section>

                </div>
                <!-- ./wrapper -->
               <!-- Layout js -->
               <script src="../Layout/layout.js"></script>
                <!-- jQuery -->
                <script src="../plugins/jquery/jquery.min.js"></script>
                <!-- jQuery UI 1.11.4 -->
                <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
                <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                <script>
                  $.widget.bridge('uibutton', $.ui.button)
                </script>
                <!-- Bootstrap 4 -->
                <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- ChartJS -->
                <script src="../plugins/chart.js/Chart.min.js"></script>
                <!-- Sparkline -->
                <script src="../plugins/sparklines/sparkline.js"></script>
                <!-- JQVMap -->
                <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
                <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                <!-- jQuery Knob Chart -->
                <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
                <!-- daterangepicker -->
                <script src="../plugins/moment/moment.min.js"></script>
                <script src="../plugins/daterangepicker/daterangepicker.js"></script>
                <!-- Tempusdominus Bootstrap 4 -->
                <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                <!-- Summernote -->
                <script src="../plugins/summernote/summernote-bs4.min.js"></script>
                <!-- overlayScrollbars -->
                <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                <!-- AdminLTE App -->
                <script src="../dist/js/adminlte.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="../dist/js/demo.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="../dist/js/pages/dashboard.js"></script>
      </body>
      <?php include ('../Layout/footer.php'); ?>
</html>