<?php
require_once '../../Controllers/postController.php';
require_once '../../Models/post.php';
$postcontroller = new PostController;
$posts = $postcontroller->getallposts();
$deleteMessage = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  if (!empty($_POST['postid'])) {

    $posts = new Post($_POST['postid'],"Noun","noun","noun","noun");
    //$posts->setPostId();
    if ($postcontroller->deletpost($posts)) {
      $deleteMessage = true;
      $posts = $postcontroller->getallposts();
    } else {
      $errMsg = "Something wrong Try Again";
    }

  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept'])) {
  if (!empty($_POST['postid'])) {

    $posts = new Post($_POST['postid'],"Noun","noun","noun","noun");
    //$posts->setPostId($_POST['postid']);
    $posts->setpostvalidation("Accepted");
    if ($postcontroller->addvalidation($posts)) {
      $deleteMessage = true;
      $posts = $postcontroller->addvalidation($posts);
    } else {
      $errMsg = "Something wrong Try Again";
    }

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Attendance Dashboard | By Code Info</title>
  <link rel="stylesheet" href="../css/mange.css" />
  <!-- Font Awesome Cdn Link -->
  
</head>
<body>
  


    <section class="main">
      <div class="main-top">
        <h1>Posts Mangment</h1>
        <a href="../Admin/AlumniList.php" style="text-decoration: none; display: inline-block;padding: 8px 16px; 
      background-color: #a486cf;color: black;">&laquo; Previous page</a>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
      </div>

      <section class="attendance">
        <div class="attendance-list">
          <h1>Posts List</h1>
          <table class="table">
            <thead>
              <tr>
              <th>ID</th>
              <th>Post Type</th>
                <th>validation</th>
                <th>description</th>
                <th>post date</th>
                <th>post time</th>
                <th>uploaded image</th>
                <th>post link</th>
                <th>uploaded link</th>
                <th>uploaded file</th>
                <th>userid</th>
                <th>Delete<th>  
</tr>
            </thead>
            <tbody >
                    <?php
                             if(count($posts)==0)
                             {
                                ?>
                                <div class="alert alert-danger" role="alert">No available news</div>
                                <?php

                             } else {
                      ?>
<?php
    foreach ($posts as $item) {
      ?>
  <tr>
  <td><?php echo $item["id"] ?></td>
  <td><?php echo $item["posttype"] ?></td>
    <td><?php echo $item["validation"] ?></td>
    <td><?php echo $item["postdescription"] ?></td>
    <td><?php echo $item["postdate"] ?></td>
     <td><?php echo $item["posttime"] ?></td>
     <td><?php echo $item["uploadedimage"] ?></td>
     <td><?php echo $item["postlink"] ?>
      </td>
      <td><?php echo $item["uploadedlink"] ?>
        </td>
        <td><?php echo $item["uploadedfile"] ?>
        <td><?php echo $item["userid"] ?> </td>
           <td>
                                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="postid" value="<?php echo $item["id"]; ?>"> <!--hidden->to make not appear as label in table-->
                                    
                                     <button class="btn btn-primary" type="sumbit" name="delete">Delete</button>
                                  </form>
                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="postid" value="<?php echo $item["id"]; ?>">
                                        <!--hidden->to make not appear as label in table-->
                                  
                                        <button class="btn btn-primary" type="sumbit" name="accept">Accept</button>
                                      </form>
                               
                                  </td>

                                  </tr>
                                    <?php
    }

                    }
            ?>       
</tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>