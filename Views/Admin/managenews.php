<?php
 require_once '../../Controllers/addnewsController.php';
 require_once '../../Models/News.php';
$addnewscontroller = new addnewsController;
$news = $addnewscontroller->getallnews();
$deleteMessage=false;
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']))
{
   if(!empty($_POST['newsid']))
   {
      
     $news=new News;
     $news->setId($_POST['newsid']);
     if($addnewscontroller->deletenew($news))
     {
         $deleteMessage=true;
        $news = $addnewscontroller->getallnews();
     }
     else{
     $errMsg="Something wrong Try Again";
     }
     
   }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Manage News</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../Layout/css/style.css">

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
    <link rel="stylesheet" href="../css/managenews.css">
    <link rel="stylesheet" href="../css/css_b/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css_b/fontawesome.min.css">
    <link rel="stylesheet" href="../js/chat.js">
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
        <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Manage News</h2>
                        </div>
                    </div>
                    <?php
        if($deleteMessage==true){
                ?>
            
            <div class="alert alert-success" role="alert">
                  Deleted successfuly
                      </div>
                      <?php
            }
             ?>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="table-wrap">
                             

                                    
                            
                             
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
                                 <table class="table">
                                    <thead class="thead-primary">
                                     
                                 
                                    <tr>
                                        <th>ID</th>
                                            <th>Title</th>
                                            <th> Describtion </th>
                                            <th>Image</th>
                                            <th>Manage</th>
                                        </tr>
                                     </thead>
                                    <tbody>

                                <?php
                                foreach($news as $item)
                                {
                                    ?>
                                <tr>
                                <td scope="row" class="scope"><?php echo $item["id"] ?></td>  
                             <td scope="row" class="scope"><?php echo $item["newstitle"] ?></td>
                             <td scope="row" class="scope"> <?php echo $item["desc"] ?></td>
                             <td scope="row" class="scope">
                                  <?php if (!empty($item["newsimage"])) { ?>
                                 <img src="<?php echo $item["newsimage"] ?>" alt="news image" style: width=150px height=100px> 
                                 <?php } ?>
                                   </td>
                                   <!--delete from table -->
                                   <td>
                                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="newsid" value="<?php echo $item["id"];  ?>"> <!--hidden->to make not appear as label in table-->
                                    
                                     <button class="btn btn-primary" type="sumbit" name="delete">Delete</button>
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
                    
                    </div>
                    </div>       
                         
                </div>
            
            </section>
             
            <script src="js/jquery.min.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
        </div>
    </div>
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