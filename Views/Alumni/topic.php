<?php
require_once '../../Controllers/PostController.php';
require_once '../../Models/topic.php';

$EventController = new PostController;
$Events = $EventController->showPost("topic");
$user = $EventController->showUser();
$totalreact = $EventController->totalReact(0);
$SavedEvents = $EventController->showSavedPosts("topic");
if (isset($_POST['createPost'])) {
  if (!empty($_POST['postDescription']) || !empty($_POST['uploadedLink']) || !empty($_POST['uploadedFile']) || !empty($_POST['uploadedImage']) ) {
    $description=""; $image=""; $link=""; $file="";
    if(!empty($_POST['postDescription']))$description = $_POST['postDescription'];
    if(!empty($_POST['uploadedImage']))$image = $_POST['uploadedImage']; 
    if(!empty($_POST['uploadedLink']))$link = $_POST['uploadedLink'];
    if(!empty($_POST['uploadedFile'])) $file = $_POST['uploadedFile'];

    $topic = new Topic("null", "$description","$image","$link","$file");
    if ($EventController->insertPost($topic,$topic->getPostType())) {
      header("location: topic.php");
    } else {
      if (!isset($_SESSION["id"])) {
        session_start();
      }
      $errMsg = $_SESSION["errMsg"];
    }
  } else {
    $errMsg = "ERROR !! Please fill all fields...!";
}
}

if (isset($_POST["delete"])) {
  if (!empty($_POST["eventid"])) {
    if ($EventController->delete($_POST["eventid"])) {
      
      $Events = $EventController->showPost("topic");
    }
  }
}

if (isset($_POST["save"])) {
  if (!empty($_POST["eventid"])) {
    if ($EventController->savePost($_POST["eventid"])) {
      $SavedEvents = $EventController->showSavedPosts("topic");
    }
  }
}

if (isset($_POST["unsave"])) {
  if (!empty($_POST["eventid"])) {
    if ($EventController->unsavePost($_POST["eventid"])) {
      $SavedEvents = $EventController->showSavedPosts("topic");
    }
  }
}

if (isset($_POST["liked"])) {
  if (!empty($_POST["eventid"]) && !empty($_POST["like"]) ) {
    if ($EventController->react($_POST["eventid"],$_POST["like"])) {
      $SavedEvents = $EventController->showSavedPosts("topic");
      $totalreact = $EventController->totalReact(0);
      $Events = $EventController->showPost($event->getPostType());
    }
  }
}
if (isset($_POST["commented"])) {
  if (!empty($_POST["eventid"]) && !empty($_POST["comment"]) ) {
    if ($EventController->comment($_POST["eventid"],$_POST["comment"])) {
      $SavedEvents = $EventController->showSavedPosts("topic");
      $Events = $EventController->showPost("topic");
    }
  }
}
?>



<!DOCTYPE html>
<!--if(isset($_GET["logout"]))
{
  session_start();
  session_destroy();
} -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Topics</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-+W8AfT6T1l6UwQ6U/8W8+V6aFzBNpN9yjJ1yzp8c7gB3C+h4Z7NS4yW8uV7nIyJmS9mRbH4wY4J3qf+I0dV1/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>


</head>

<body >
<?php include( '../Layout/alumniheader.php');?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Topic</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../Alumni/news.php">Home</a></li>
                <li class="breadcrumb-item active">Topic page</li>
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

              <!-- create post card -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                  <div class="user-block">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../dist/img/<?php echo $user[0]["userimage"] ?>" alt="user image">
                      <span class="username">
                        <a href="#" style="color: #646363;"><?php echo $user[0]["firstname"] . " " . $user[0]["lastname"]; ?></a>
                        </span>
                      <span class="description">Public</span>
                    </div>
                  </div>
                  <br>
                  <form method="post">
                    <textarea name="postDescription" id="summernote" rows="7" cols="33"
                      placeholder="What event would you like to post, Admin?.."
                      style="border: none; margin-left: 45px; outline: none;"></textarea>

                    <hr style="width: 85%;">
                    <div class="user-block">
                      <div class="user-block">
                        <span class="username">
                          <div class="form-group row">
                          <div  class="form-group row" style="margin-bottom: -10px;">
                          <p style="color: #646363;">Add to your post :</p>
                        </div>
                          <div  class="form-group row">
                            <label for="uploadedImage" style=" color: #007bff; margin-right:40%;"><i class="fas fa-image" style=" color: #007bff;"></i> Photo: </label>
                            <input type="file" id="uploadedImage"  accept="image/png, image/jpeg, image/jpg"  name="uploadedImage">
                          </div>
                          <div  class="form-group row">
                            <label for="uploadedFile" style=" color: #28a745; margin-right:40%;"><i class="fas fa-file" style=" color:#28a745; " ></i> File: </label>
                            <input type="file" id="uploadedFile"  name="uploadedFile">
                          </div>
                          <div  class="form-group row">
                            <label for="uploadedLink" style=" color: #ffc107; margin-right:40%;"><i class="fas fa-link" style=" color: #ffc107;"></i> Link:</label>
                            <input type="text" id="uploadedLink" placeholder="Provide a link"  name="uploadedLink">
                          </div>
                           

                        </div>
                        </span>
                      </div>

                    </div>

                    <div class="timeline-footer">
                      <div class="button">
                        <input class="btn btn-primary btn-sm" style="margin-left: 65%; width: 30%;" type="submit" name="createPost"
                          value=" Post">
                      </div>

         </form>
                  <!--  <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
                </div>
              </div>

            </div>

            <!-- /end create post card-->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Saved posts</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php

                    foreach ($Events as $event) {
                      if ($event["validation"] == "accepted") {
                        ?>
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo $event["userimage"] ?>"
                              alt="user image">
                            <span class="username">
                              <a href="#">
                                <?php echo $event["firstname"] . " " . $event["lastname"]; ?>
                              </a>
                              <span class="float-right">
                                <div class="btn-group">
                                  <?php
                                  if ($event["userid"] == $_SESSION["userId"]) {
                                    ?>
                                    <form action="topic.php" method="POST">
                                      <input type="hidden" name="eventid" value="<?php echo $event["id"] ?>">
                                      <button type="submit" name="delete" class="btn btn-default btn-sm">
                                        <i class="far fa-trash-alt"></i>

                                      </button>
                                    </form>
                                    <?php
                                  }
                                  ?>
                                  <form action="topic.php" method="POST">
                                    <input type="hidden" name="eventid" value="<?php echo $event["id"] ?>">
                                    <button type="submit" name="save" class="btn btn-default btn-sm">
                                      <i class="fas fa-reply"></i>

                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </form>

                                </div>
                              </span>


                            </span>

                            <span class="description">Posted
                              <?php echo "an " . $event["posttype"] . "-" . $event["posttime"] . " " . $event["postdate"]; ?>
                            </span>

                          </div>
                          <!-- /.user-block -->
                          <p>
                          <?php
                            if (!empty($event["postdescription"])) {
                              ?>
                            <div class="col-sm-6">
                             <?php echo $event["postdescription"]; ?>
                             <br>
                            </div>
                            <?php
                            }
                            ?>
                            
                            
                            <?php
                            if (!empty($event["uploadedlink"])) {
                              ?>
                            <div class="col-sm-6">
                             <?php echo "Link : "?><a href="<?php echo $event["uploadedlink"]?>" target="_blank">
                             <?php echo  $event["uploadedlink"]; ?></a> 
                             <br>
                            </div>
                            <?php
                            }
                            ?>
                            
                            <?php
                             if (!empty($event["uploadedfile"])) {
                              ?>
                            <div class="col-sm-6">
                            <?php echo "File : "?><a href="../dist/img/<?php echo $event["uploadedfile"]; ?>" target="_blank">
                             <?php echo  $event["uploadedfile"]; ?></a> 
                             <br>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (!empty($event["uploadedimage"])) {
                              ?>
                            <div class="col-sm-6">
                              <img class="img-fluid" src="../dist/img/<?php echo $event["uploadedimage"]; ?>" alt="Photo">
                            </div>
                            <?php
                            }
                            ?>



                          <!-- <div class="col-sm-6">
                                <img class="img-fluid" src="../../Images/microsoft topic.jpg" alt="Photo">
                              </div> -->
                          </p>


                          <p>
                          <form action="topic.php" method="POST">
                            <input type="hidden" name="eventid" value="<?php echo $event["id"] ?>">
                            <input type="hidden" name="like" value="liked">

                            <button type="submit" name="liked" class="btn btn-default btn-sm">
                              <i class="far fa-thumbs-up mr-1"></i>
                              
                              <?php $totalreact = $EventController->totalReact($event["id"]);
                              if (count($totalreact)) {
                                echo $totalreact[0]["totalreact"];
                              } else {
                                echo "0";
                              } ?> 
                              <span class="tf-icons bx bx-trash"></span>
                            </button>
                          </form>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments
                            </a>
                          </span>
                          </p>
                          <form class="form-horizontal" method="POST">
                            <div class="input-group input-group-sm mb-0">
                              <input type="hidden" name="eventid" value="<?php echo $event["id"] ?>">
                              <input class="form-control form-control-sm" name="comment" type="text"
                                placeholder="Type a comment">
                              <div class="input-group-append">
                                <button type="submit" name="commented" class="btn btn-danger">post comment</button>
                              </div>
                            </div>
                          </form>
                          <br>
                          <?php 
                          $comments= $EventController->showComment($event["id"]) ;
                          foreach($comments as $comment){
                            ?>
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../dist/img/<?php echo $comment["userimage"] ?>" alt="user image">
                            
                            <p> <?php echo $comment["firstname"]." ".$comment["lastname"] ?> </p>
                            </div>
                            <p> <?php echo $comment["comment"]?> </p>
                            <br>

                            <?php

                          }
                          
                          ?>


                          
                        </div>
                        <?php
                      }
                    }
                    ?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <?php foreach ($SavedEvents as $savedEvent) {
                      if ($savedEvent["userid"] == $_SESSION["userId"]) {



                        ?>
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../dist/img/<?php echo $savedEvent["userimage"] ?>"
                              alt="user image">
                            <span class="username">
                              <a href="#">
                                <?php echo $savedEvent["firstname"] . " " . $savedEvent["lastname"]; ?>
                              </a>
                              <span class="float-right">
                                <div class="btn-group">
                                  <?php
                                  if ($savedEvent["iduser"] == $savedEvent["userid"] ) {
                                    ?>
                                    <form action="topic.php" method="POST">
                                      <input type="hidden" name="eventid" value="<?php echo $savedEvent["id"] ?>">
                                      <button type="submit" name="delete" class="btn btn-default btn-sm">
                                        <i class="far fa-trash-alt"></i>

                                      </button>
                                    </form>
                                    <?php
                                  }
                                  ?>
                                  <form action="topic.php" method="POST">
                                    <input type="hidden" name="eventid" value="<?php echo $savedEvent["savedid"] ?>">
                                    <button type="submit" name="unsave" class="btn btn-default btn-sm">
                                      <i class="fas fa-reply"></i>

                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </form>

                                </div>
                              </span>
                            </span>
                            <span class="description">
                              <?php echo "an " . $savedEvent["posttype"] . "-" . $savedEvent["posttime"] . " " . $savedEvent["postdate"]; ?>
                            </span>


                          </div>
                          <!-- /.user-block -->
                          <!-- /.user-block -->
                          <p>
                            <?php echo $savedEvent["postdescription"];

                            ?>
                            
                            <?php
                            if (!empty($savedEvent["uploadedlink"])) {
                              ?>
                            <div class="col-sm-6">
                             <?php echo "Link : "?><a href="<?php echo $savedEvent["uploadedlink"]?>" target="_blank">
                             <?php echo  $savedEvent["uploadedlink"]; ?></a> 
                             <br>
                            </div>
                            <?php
                            }
                            ?>
                            
                            <?php
                             if (!empty($savedEvent["uploadedfile"])) {
                              ?>
                            <div class="col-sm-6">
                            <?php echo "File : "?><a href="../dist/img/<?php echo $savedEvent["uploadedfile"]; ?>" target="_blank">
                             <?php echo  $savedEvent["uploadedfile"]; ?></a> 
                             <br>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (!empty($savedEvent["uploadedimage"])) {
                              ?>
                            <div class="col-sm-6">
                              <img class="img-fluid" src="../dist/img/<?php echo $savedEvent["postimage"]; ?>" alt="Photo">
                            </div>
                            <?php
                            }
                            ?>
                          </p>


                          <p>
                          <form action="topic.php" method="POST">
                            <input type="hidden" name="eventid" value="<?php echo $savedEvent["id"] ?>">
                            <input type="hidden" name="like" value="liked">

                            <button type="submit" name="liked" class="btn btn-default btn-sm">
                              <i class="far fa-thumbs-up mr-1"></i>
                              <?php $totalreact = $EventController->totalReact($savedEvent["id"]);
                              if (count($totalreact)) {
                                echo $totalreact[0]["totalreact"];
                              } else {
                                echo "0";
                              } ?> 
                              <span class="tf-icons bx bx-trash"></span>
                            </button>
                          </form>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments
                            </a>
                          </span>
                          </p>
                          <form class="form-horizontal" method="POST">
                            <div class="input-group input-group-sm mb-0">
                              <input type="hidden" name="eventid" value="<?php echo $savedEvent["id"] ?>">
                              <input class="form-control form-control-sm" name="comment" type="text"
                                placeholder="Type a comment">
                              <div class="input-group-append">
                                <button type="submit" name="commented" class="btn btn-danger">post comment</button>
                              </div>
                            </div>
                          </form>
                          <br>
                          <?php 
                          $comments= $EventController->showComment($savedEvent["id"]) ;
                          foreach($comments as $comment){
                            ?>
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../dist/img/<?php echo $comment["userimage"] ?>" alt="user image">
                            
                            <p> <?php echo $comment["firstname"]." ".$comment["lastname"] ?> </p>
                            </div>
                            <p> <?php echo $comment["comment"]?> </p>
                            <br>

                            <?php

                          }
                          
                          ?>
                        </div>
                        <?php
                      }
                    }
                    ?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->


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
  <script src="js/index.js"></script>
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
</body>
<?php include ('../Layout/footer.php'); ?>
</html>