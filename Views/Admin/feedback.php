<?php 
require_once "../../controllers/Admin3Controller.php";
require_once "../../Models/post.php";
$AdminController = new AdminController;
$Alumni = $AdminController->getAllFeedback();
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
<a href="../Admin/AlumniList.php" style="text-decoration: none; display: inline-block;padding: 8px 16px; 
      background-color: #a486cf;color: black;">&laquo; Previous page</a>
  


    <section class="main">
      <div class="main-top">
        <h1>Feedback </h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
      </div>

      <section class="attendance">
        <div class="attendance-list">
          <h1>The Feedbacks</h1>
          <table class="table">
            <thead>
              <tr>
                <th>User</th>
                <th>emoji</th>
                <th>description</th>
              </tr>
            </thead>
            <tbody >


<?php

foreach ($Alumni as $alumni) {
?>
  <tr>
  <td><?php echo $alumni["firstname"]." ".$alumni["lastname"] ?></td>
  <td><?php echo $alumni["emoji"] ?></td>
  <td><?php echo $alumni["feedbackdesc"] ?></td>
  </tr>
<?php
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