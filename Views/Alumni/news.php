<?php
 require_once '../../Controllers/addnewsController.php';
 require_once '../../Controllers/DonationController.php';
require_once '../../Controllers/AlumniController.php';
require_once '../../Controllers/AdminController.php';
//require_once '../../Controllers/Admin2Controller.php';
 require_once '../../Models/News.php';
 require_once '../../Models/donation.php';
require_once '../../Models/mentorForm.php';
require_once '../../Controllers/PostController.php';

$addnewscontroller= new  addnewsController;
$news= new News;
$news=$addnewscontroller->getallnews();
$donationcontroller=new DonationController;
$donation=$donationcontroller->getalldonations();
 
if(!empty($donation))$donationCount = count($donation); else $donationCount=0;// Get the number of donations
$mentorcontroller = new AlumniController;
$mentor = $mentorcontroller->getallprograms();
 
if(!empty($mentor))$mentor = count($mentor);else $mentor=0; // Get the number of programs

$admincontroller = new AdminController;
$alumni = $admincontroller->getAlumni();
if(!empty($alumni))$alumni = count($alumni); else $alumni=0;// Get the number of alumni

$postcontroller = new PostController;
$postcontroller = $postcontroller->countPost();
if(!empty($post))$post = count($postcontroller); else $post=0; // Get the number of posts

?>

 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> News</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>
    <link rel="stylesheet" href="Layout/css/style.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Layout/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../Layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Layout/dist/css/adminlte.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>



</head>

<body>
<?php include( '../Layout/alumniheader.php'); ?>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

     
        <div id="stickyContent"></div>

    
        <div class="contentWrap">
            <!-- ======= Hero Section ======= -->
            <script src="path/to/purecounter.min.js"></script>
            
            <section id="hero" class="hero d-flex align-items-center">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <h1 data-aos="fade-up">Grow the network</h1>
                            <h2 data-aos="fade-up" data-aos-delay="400"> it's not about building the network, we all
                                should join together,
                                support others in their challenges, and provide good ooportunities.</h2>
                            <div data-aos="fade-up" data-aos-delay="600">
                                <div class="text-center text-lg-start">
                                    <a href="about.php"
                                        class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                        <span>Read more</span>
                                        
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </section><!-- End Hero -->
            <!-- ======= Counts Section ======= -->
            
            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">
                    <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
            
               
                    <div class="count-box">
   
   <i class="bi bi-people" style="color: #bb0852;"></i>
         <div>
        <p>Alumni</p>
        <div>
        <h3> <?php echo $alumni; ?> </h3>
          </div>
            </div>
         </div>


</div>

<div class="col-lg-3 col-md-6">
  <div class="count-box">
      <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
      <div>
      <p>Posts</p>
      
           <div> <h3> <?php echo $post; ?>  </h3></div>
      </div>
  </div>
</div>
<div class="col-lg-3 col-md-6">
  <div class="count-box">
                        <i class="bi bi-people" style="color: #bb0852;"></i>
                            <div>
                            <p>Donations</p>
                        <div>
        
                <h3><?php echo $donationCount; ?></h3>
            <?php  ?>
        </div>
    </div>
                        </div>
</div>
</div>
                    </div>
                </div>
            </section>
            </section><!-- End Counts Section -->
            <!-- ======= Recent Blog Posts Section ======= -->
            <section id="recent-blog-posts" class="recent-blog-posts">

                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <h1>News</h1>
                        <p>Recent News form our Alumni</p>
                    </header>

                    <div class="row">
                    <?php
                             if(count($news)==0)
                             {
                                ?>
                                <div class="alert alert-danger" role="alert">No available news</div>
                                <?php

                             }
                        
                             else
                             {
                                 ?>
                        <div class="col-lg-4">
                        <?php 
                    
                    foreach ($news as $item) 
                    {  
                        ?>
                
                            <div class="post-box">
                                 
                                <div class="post-img">
                                <?php if (!empty($item["newsimage"])) { ?>
                                 <img src="<?php echo $item["newsimage"] ?>" alt="news image" style: width="500px" height="200px"> 
                                 <?php } ?>
                                </div>
                                <span class="post-date"> <?php echo $item["time"] ?></span>
                                <h3 class="post-title">  <?php echo $item["newstitle"]?></h3>
                                    <p>  <?php echo $item["desc"] ?></p>
                                 
                            </div>
                             
                             
                        </div>
                       <?php 
                    }

                }
            
            ?>            

                    </div>
                
                </div>

            </section><!-- End Recent Blog Posts Section -->




        </div>
    </div>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <!--Main layout-->

     
<script src="../Layout/js/index.js"></script>

 <!-- Layout js -->
 <script src="../Layout/layout.js"></script>
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>

<?php include ('../Layout/footer.php'); ?>

</html>