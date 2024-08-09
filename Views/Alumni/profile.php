<?php
require_once '../../Controllers/ProfileController.php';
$profile = new ProfileController;
//$_SESSION["profileAlumniId"]=3;
$_SESSION["alumniId"]=$_SESSION["userId"];
$profilePostsController = new ProfileController;
$profilePosts= $profilePostsController->showPost($_SESSION["profileAlumniId"]);


if(!empty($_POST["image-input"]))$selection = $_POST["image-input"];
else $selection = "Nothing Selected";

if(isset($_POST["manageProfileButton"]))
{
  foreach($_POST as $key => $value)
  {
    if(!empty($value)) $profile->Manage($_SESSION["alumniId"],$key,$value );  
  }
}


if (isset($_POST["delete"])) {
  if (!empty($_POST["postid"])) {
    if ($profilePostsController->delete($_POST["postid"])) {   
      $profilePosts = $profilePostsController->showPost($_SESSION["profileAlumniId"]);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+W8AfT6T1l6UwQ6U/8W8+V6aFzBNpN9yjJ1yzp8c7gB3C+h4Z7NS4yW8uV7nIyJmS9mRbH4wY4J3qf+I0dV1/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>

</head>
<body >
<?php include( '../Layout/alumniheader.php'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Alumni/news.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
            <!-- Profile card -->
            <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/<?php 
                       if(empty($profile->display($_SESSION["profileAlumniId"],"userimage")))  $profile->Manage($_SESSION["profileAlumniId"],"userimage","default.png");
                       echo "{$profile->display($_SESSION["profileAlumniId"],"userimage")}";        
                       ?>"alt="User profile picture">
                </div>
                
                <!--FIRST, LAST NAME-->
                <h3 class="profile-username text-center">
                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"firstname")&&$profile->display($_SESSION["profileAlumniId"],"lastname")))
                  echo "{$profile->display($_SESSION["profileAlumniId"], "firstname")} {$profile->display($_SESSION["profileAlumniId"], "lastname")}"; 
                ?>
                </h3>

                <!--BIO-->
                <p class="text-muted text-center"> 
                  <?php if(!empty($profile->display($_SESSION["profileAlumniId"],"bio"))) echo "{$profile->display($_SESSION["profileAlumniId"],"bio")}"; ?>
                </p>

                <!--DOWNLOAD CV....COPY PROFILE LINK-->
                  <div class="ico" style="flex-direction: row; display:flex;  margin-top:5%;">     

                  <a class="btn btn-primary btn-block" style="width: 50%; height: 5%; margin-right: 20%; "
                   href="../dist/img/<?php
                   if(!empty($profile->display($_SESSION["profileAlumniId"],"resumelink"))) echo "{$profile->display($_SESSION["profileAlumniId"],"resumelink")}"; 
                   else echo "blank.pdf"
                   ?>" download="resume" ><i class="fa fa-download" ></i><b>Download Resume</b></a>
                    
                  <a class="btn btn-default" id="copylink" href="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" 
                    onclick="copyURI(event)"><i class="fa fa-clone"></i><b> Copy Profile Link</b></a>
                  
          
                </div>
              </div>
            </div>
            <!-- /end profile card-->
            
           
            <!-- About Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted"style="margin-left: 22px; white-space:pre-line;">Helwan University |<br>Bachelor's of Computer Science<br><?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"education")))
                {
                   echo "{$profile->display($_SESSION["profileAlumniId"],"education")}"; 
                }
                ?></p>

                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"location")))
                {?>
                <hr><strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                  <p class="text-muted"style="margin-left: 22px; white-space:pre-line;"><?php echo "{$profile->display($_SESSION["profileAlumniId"],"location")}"; ?></p>
  
                <?php
                }?>
                
                
                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"experience")))
                {?>
                <hr> <strong><i class="fas fa-briefcase"></i> &nbsp;Experience</strong>

                <p class="text-muted"style="margin-left: 22px; white-space:pre-line;"><?php echo "{$profile->display($_SESSION["profileAlumniId"],"experience")}"; ?></p>
                <?php
                }?>

                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"skills")))
                {?>
                <hr><strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                <p class="text-muted" style=" margin-left: 22px; white-space:pre-line;"><?php  echo "{$profile->display($_SESSION["profileAlumniId"],"skills")}"; ?></p>
                <?php
                }?>
              
                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"volunteering")))
                {?>
                <hr> <strong><i class="fas fa-hands-helping"></i> &nbsp; Volunteering</strong>

                <p class="text-muted" style="margin-left: 22px; white-space:pre-line;"><?php echo "{$profile->display($_SESSION["profileAlumniId"],"volunteering")}"; ?></p>
                <?php
                }?>

                 <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"events")))
                {?>
                <hr> <strong><i class="fas fa-user-friends"></i>&nbsp; Events</strong>
                <p class="text-muted"  style="margin-left: 22px; white-space:pre-line;"><?php echo "{$profile->display($_SESSION["profileAlumniId"],"events")}"; ?></p>
                <?php
                }?>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Contact Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Contact Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"githublink")))
                {?>
                <strong><ion-icon name="logo-github"style="font-size:15px;"></ion-icon><a href="<?php echo "{$profile->display($_SESSION["profileAlumniId"],"githublink")}"; ?>" target="_blank">&nbsp; &nbsp;<?php echo "{$profile->display($_SESSION["profileAlumniId"],"githublink")}"; ?></a></strong>
                <hr>
                <?php
                }?>

                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"linkedinlink")))
                {?>
                <strong><ion-icon name="logo-linkedin"style="font-size:15px;"></ion-icon><a href="<?php echo "{$profile->display($_SESSION["profileAlumniId"],"linkedinlink")}"; ?>"target="_blank">&nbsp; &nbsp;<?php echo "{$profile->display($_SESSION["profileAlumniId"],"linkedinlink")}"; ?></a></strong>
                <hr>
                <?php
                }?>

                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"gmaillink")))
                {?>
                <strong><ion-icon name="mail-outline"style="font-size:15px;"></ion-icon><a href="mailto:<?php echo "{$profile->display($_SESSION["profileAlumniId"],"gmaillink")}"; ?>"target="_blank">&nbsp; &nbsp;<?php echo "{$profile->display($_SESSION["profileAlumniId"],"gmaillink")}"; ?></a></strong>
                <hr>
                <?php
                }?>


                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"twitterlink")))
                {?>
                <strong><ion-icon name="logo-twitter"style="font-size:15px;"></ion-icon><a href="<?php echo "{$profile->display($_SESSION["profileAlumniId"],"twitterlink")}"; ?>"target="_blank">&nbsp; &nbsp;<?php echo "{$profile->display($_SESSION["profileAlumniId"],"twitterlink")}"; ?></a></strong>
                <hr>
                <?php
                }?>

                <?php
                if(!empty($profile->display($_SESSION["profileAlumniId"],"facebooklink")))
                {?>
                <strong><ion-icon name="logo-facebook"style="font-size:15px;"></ion-icon><a href="<?php echo "{$profile->display($_SESSION["profileAlumniId"],"facebooklink")}"; ?>"target="_blank">&nbsp; &nbsp;<?php echo "{$profile->display($_SESSION["profileAlumniId"],"facebooklink")}"; ?></a></strong>
                <?php
                }?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Posts</a></li>
                  <?php
                  if($_SESSION["profileAlumniId"]==$_SESSION["alumniId"])
                  {?>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Account</a></li>
                  <?php

                  }
                  ?>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                     <!-- Post -->
                     <?php

foreach ($profilePosts as $post) {
  if ($post["validation"] == "accepted") {
    ?>
    <div class="post">
      <div class="user-block">
        <img class="img-circle img-bordered-sm" src="../../dist/img/<?php
         // if(empty($profile->display($_SESSION["profileAlumniId"],"userimage")))  $profile->Manage($_SESSION["profileAlumniId"],"userimage","default.png");
          echo "{$profile->display($_SESSION["profileAlumniId"],"userimage")}"; ?>"
          alt="user image">
        <span class="username">
          <a href="#">
            <?php echo $post["firstname"] . " " . $post["lastname"]; ?>
          </a>
          <span class="float-right">
            <div class="btn-group">
              <?php
              if ($post["userid"] == $_SESSION["alumniId"]) {
                ?>
                <form action="profile.php" method="POST">
                  <input type="hidden" name="postid" value="<?php echo $post["id"] ?>">
                  <button type="submit" name="delete" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </form>
                <?php
              }
              ?>
              <form action="profile.php" method="POST">
                <input type="hidden" name="postid" value="<?php echo $post["id"] ?>">
                <button type="submit" name="save" class="btn btn-default btn-sm">
                  <i class="fas fa-reply"></i>
                  <span class="tf-icons bx bx-trash"></span>
                </button>
              </form>

            </div>
          </span>


        </span>

        <span class="description">Posted
          <?php echo "an " . $post["posttype"] . "-" . $post["posttime"] . " " . $post["postdate"]; ?>
        </span>

      </div>
      <!-- /.user-block -->
      <p>

      <?php
        if (!empty($post["postdescription"])) {
          ?>
        <div class="col-sm-6">
         <?php echo $post["postdescription"]; ?>
         <br>
        </div>
        <?php
        }
        ?>
        
        
        <?php
        if (!empty($post["uploadedlink"])) {
          ?>
        <div class="col-sm-6">
         <?php echo "Link : "?><a href="<?php echo $post["uploadedlink"]?>" target="_blank">
         <?php echo  $post["uploadedlink"]; ?></a> 
         <br>
        </div>
        <?php
        }
        ?>
        
        <?php
         if (!empty($post["uploadedfile"])) {
          ?>
        <div class="col-sm-6">
        <?php echo "File : "?><a href="../dist/img/<?php echo $post["uploadedfile"]; ?>" target="_blank">
         <?php echo  $post["uploadedfile"]; ?></a> 
         <br>
        </div>
        <?php
        }
        ?>

        <?php
        if (!empty($post["uploadedimage"])) {
          ?>
        <div class="col-sm-6">
          <img class="img-fluid" src="../dist/img/<?php echo $post["uploadedimage"]; ?>" alt="Photo">
        </div>
        <?php
        }
        ?>

      </p>


      <p>
      <form action="event.php" method="POST">
        <input type="hidden" name="eventid" value="<?php echo $post["id"] ?>">
        <input type="hidden" name="like" value="liked">

        <button type="submit" name="liked" class="btn btn-default btn-sm">
          <i class="far fa-thumbs-up mr-1"></i>
          
          <?php  if (count($profilePosts) ==! 0) {echo $totalreact[0]["totalreact"]; } else{echo "0";}?> 
          <span class="tf-icons bx bx-trash"></span>
        </button>
      </form>
      <span class="float-right">
        <a href="#" class="link-black text-sm">
          <i class="far fa-comments mr-1"></i> Comments (3)
        </a>
      </span>
      </p>
    <form class="form-horizontal" method="POST">
    <div class="input-group input-group-sm mb-0">
    <input type="hidden" name="eventid" value="<?php echo $post["id"] ?>">
    <input class="form-control form-control-sm" name="comment" type="text" placeholder="Type a comment">
      <div class="input-group-append">
        <button type="submit" name="commented" class="btn btn-danger">post comment</button>
      </div>
    </div>
  </form>

      
    </div>
    <?php
  }
}
?>
<!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="profile.php" method="post">
                     
             
                      <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="bio" name="bio" placeholder="Bio"></textarea>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="education" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="education" name="education" placeholder="Education"></textarea>
                          </div>
                   
                      </div>
                      <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="location" name="location" placeholder="Location"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="experience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="ta" name="experience" placeholder="Experience"></textarea>
                        </div>
                        

                      </div>
                      <div class="form-group row">
                        <label for="skills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                        <textarea class="form-control"   id="skills" name="skills" placeholder="Skills"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="volunteering" class="col-sm-2 col-form-label">Volunteering</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="volunteering" name="volunteering" placeholder="Volunteering"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="events" class="col-sm-2 col-form-label">Events</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="events" name="events" placeholder="Events"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="gmaillink" class="col-sm-2 col-form-label">Gmail Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="gmaillink" name="gmaillink" placeholder="Gmail Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="githublink" class="col-sm-2 col-form-label">Github Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="githublink" name="githublink" placeholder="Github Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="linkedinlink" class="col-sm-2 col-form-label">Linkedin Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="linkedinlink" name="linkedinlink" placeholder="Linkedin Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="twitterlink" class="col-sm-2 col-form-label">Twitter Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="twitterlink" name="twitterlink" placeholder="Twitter Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="facebooklink" class="col-sm-2 col-form-label">Facebook Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="facebooklink" name="facebooklink" placeholder="Facebook Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="userimage" class="col-sm-2 col-form-label">Profile Picture</label>
                      
                        <input type="file" id="userimage" accept="image/png, image/jpeg, image/jpg" name="userimage">
                        
                      
                   </div>
                        <div class="form-group row">
                      <label for="resumelink" class="col-sm-2 col-form-label">Resume</label>
                      
                        <input type="file" id="resumelink" accept="application/pdf" name="resumelink">
                  </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="manageProfileButton" onclick='copycontent();' id='btn'>Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
         

    <!-- /.content -->
  </div>

<!-- Layout js -->
<script src="../Layout/layout.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
function copyURI(evt) {
    evt.preventDefault();
    navigator.clipboard.writeText(evt.target.getAttribute('href')).then(
      () => { alert("Copied successfully!");},
      () => { alert("error in copying the url!");}
      );
    
}
  </script>
</body>
<?php include ('../Layout/footer.php'); ?>
</html>
