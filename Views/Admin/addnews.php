<?php
require_once '../../Controllers/addnewsController.php';
require_once '../../Models/News.php';
$addnewscontroller = new addnewsController;
$news = $addnewscontroller->getallnews();
$addMessage = false;
$errMsg = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['upload-file'])) {
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            $addMessage = true;
            $news = new News;
            $news->setDescription($_POST['description']);
            $news->setNewsTitle($_POST['title']);
            $id = $_SESSION["userId"] ;
            $news->setId($id);
            //image
            $location = "../Images/" . date("h-i-s") . $_FILES["upload-file"]["name"];
            if (move_uploaded_file($_FILES["upload-file"]["tmp_name"], $location)) {
                $news->setNewsImage($location);
                if ($addnewscontroller->addnews($news)) {
                    header("location: addnews.php");
                } else {
                    $errMsg = "Something wrong Try Again";
                }
            } else {
                $errMsg = "Error in upload";
            }
        } else {
            $errMsg = "Please fill all the data";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Add News</title>

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
    <!--chat-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/addnews.css">
    <link rel="stylesheet" href="../css/roboto-font.css">
    <link rel="stylesheet" href="../css/css_b/fontawesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
        <!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>

</head>

<body>
<?php include( '../Layout/adminheader.php'); ?>

        <div class="contentWrap">
            <div class="page-content">
                <div class="form-v5-content">
                    <form class="form-detail" method="post" enctype="multipart/form-data">

                        <h2>Add News</h2>
                        <div class="form-row">

                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="input-text" placeholder="Title" required>

                        </div>
                        <div class="form-row">
                            <label for="description">Description</label>

                            <textarea id="description" name="description" rows="4" cols="80"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="form-row">
                            <label for="upload-file">Upload File</label>
                                <i class="fa fa-2x fa-camera"></i>
                            <input type="file" name="upload-file" id="upload-file" class="input-text"
                                placeholder="Upload File" required>
                            
                        </div>
                        <div class="form-row-last">
                            <input type="submit" name="add" class="add" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($addMessage) { ?>
        <div class="alert alert-success" role="alert">
            News added successfully
        </div>
    <?php } else if ($errMsg != "") { ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $errMsg; ?>
            </div>
    <?php } ?>
     
<script src="Layout/js/index.js"></script>


<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->
<!-- Layout js -->
<script src="../Layout/layout.js"></script>
<!-- jQuery -->
<script src="../Layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/dist/js/adminlte.min.js"></script>
<?php include ('../Layout/footer.php'); ?>

</html>