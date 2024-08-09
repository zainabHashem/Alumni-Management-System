<?php
require_once '../../Controllers/AlumniController.php';
require_once '../../Models/mentorForm.php';
$AlumniController = new AlumniController;


$errMsg = "";
if ( isset($_POST['topic']) && isset($_POST['day']) && isset($_POST['time']) && isset($_POST['from']) && isset($_POST['to'])) {
  if (!empty($_POST['topic']) && !empty($_POST['day']) && !empty($_POST['time']) && !empty($_POST['from']) && !empty($_POST['to'])) {
    $topic = $_POST['topic'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    $form = new MentorForm;
    $form->setTopic($topic);
    $form->setDays($day);
    $form->setTime($time);
    $form->setDateFrom($from);
    $form->setDateTo($to);

    if ($AlumniController->addMentor($form)) {
      header("location: form.php");
    } else {
      
        session_start();
      
      $errMsg = $_SESSION["errMsg"];
    }
  } else {
    $errMsg = "Fill all filds plz";
  }
}


?>




<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description"
    content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Mentor Form</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css" />
  <link rel="stylesheet" type="text/css"
    href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css" />
  <link href="../Dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="../Alumni/news.php">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              <!--
                <img
                  src="../assets/images/logo-text.png"
                  alt="homepage"
                  class="light-logo"
                />
                -->
            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->


        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
  </aside>
  <!-- ============================================================== -->
  <!-- End Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Form Basic</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Alumni/news.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Library
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <div class="row  justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <form class="form-horizontal" method="post" action="form.php">
              <div class="card-body">
                <h4 class="card-title">Mentor Form</h4>
                <?php 
            if($errMsg!="")
            {
                ?>
                    <div> <?php echo $errMsg ?></div>
                <?php
            }
            
            ?>    

                <br><br>
                <div>

                  <div>
                    <label for="topic">Topic &nbsp;</label>
                    <select id="topic" name="topic">
                      <option value="pm">problem solving</option>
                      <option value="plb">problem language basics</option>
                      <option value="oop">oop</option>
                      <option value="ds">data structure</option>
                      <option value="algo">algorithm</option>
                      <option value="back end">back end</option>
                      <option value="front end">front end</option>
                      <option value="sw eng processes">software engineering processes</option>
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <label> Avilable date </label>
                    <div>
                      <label for="for">&nbsp; &nbsp; From: &nbsp; &nbsp;</label>
                      <input type="date" name="from" placeholder="yyyy-mm-dd" />
                    </div>
                    <div>
                      <label for="for">&nbsp; &nbsp; To: &nbsp; &nbsp; &nbsp; &nbsp; </label>
                      <input type="date" name="to" placeholder="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div>
                    <label for="day">Day : &nbsp;&nbsp;</label>
                    <select id="day" name="day">
                      <option value="Saturday">Saturday</option>
                      <option value="Sunday">Sunday</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                    </select>
                  </div>
                  <div>
                    <label for="for"><br>Time: &nbsp; </label>
                    <input type="time" name="time">
                  </div>
                  <!-- <div class="form-group row">
                      <label for="cono1" ><br>Message</label>
                      <div class="col-sm-9">
                        <textarea class="form-control"></textarea>
                      </div>-->
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <div class="button">
                    <input type="submit" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>

          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
          <!-- </div>    -->
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- footer -->
          <!-- ============================================================== -->
              
        <footer class="footer text-center">
        All Rights Reserved by Alumni SYSTEM. Designed and Developed by
          <a href="../Alumni/news.php">Alumni Managemnt</a>.
        </footer>
     
          <!-- ============================================================== -->
          <!-- End footer -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
      <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
      <!--Wave Effects -->
      <script src="../dist/js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="../dist/js/sidebarmenu.js"></script>
      <!--Custom JavaScript -->
      <script src="../dist/js/custom.min.js"></script>
      <!-- This Page JS -->
      <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
      <script src="../dist/js/pages/mask/mask.init.js"></script>
      <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
      <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
      <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
      <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
      <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
      <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
      <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="../assets/libs/quill/dist/quill.min.js"></script>
      <script>
        //*************//
        // For select 2
        //*************//
        $(".select2").select2();

        /colorpicker/
        $(".demo").each(function () {
          //
          // Dear reader, it's actually very easy to initialize MiniColors. For example:
          //
          //  $(selector).minicolors();
          //
          // The way I've done it below is just for the demo, so don't get confused
          // by it. Also, data- attributes aren't supported at this time...they're
          // only used for this demo.
          //
          $(this).minicolors({
            control: $(this).attr("data-control") || "hue",
            position: $(this).attr("data-position") || "bottom left",

            change: function (value, opacity) {
              if (!value) return;
              if (opacity) value += ", " + opacity;
              if (typeof console === "object") {
                console.log(value);
              }
            },
            theme: "bootstrap",
          });
        });
        /datwpicker/
        jQuery(".mydatepicker").datepicker();
        jQuery("#datepicker-autoclose").datepicker({
          autoclose: true,
          todayHighlight: true,
        });
        var quill = new Quill("#editor", {
          theme: "snow",
        });
      </script>

</body>

</html>