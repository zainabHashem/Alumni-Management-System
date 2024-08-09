
<header>
  <div id="main" class="duplicate">
    <ul class="navv">

    <li >
        <a href="../Admin/AlumniList.php" title="Home">
          <span class="icon-stack">
            <i class="icon-circle icon-stack-base"></i>
            <i class="icon-home icon-light"></i>
          </span>
          <span class="text">Home</span>
        </a>
      </li>





     

      
      <div  class="icon-stack" id ="changeright">
        <!--search -->
        <form action="" class="search-bar" method="post">
         <input type="search" name="search" pattern=".*\S.*"  placeholder="search by username or email..  " required>
         <button class="search-btn" type="submit" name="submit">
           <span>Search</span>
         </button>
       </form>
      </div> 

     

     </div> 


    </ul>
  </div>
  <div id="stickyContent"></div>
  
</header>

  <div class="content">

    <nav>
    <menu>
      <menuitem id="demo1">
        <a>Menu </i></a>
        <menu>
          <menuitem><a href="../Admin/AlumniList.php">Alumni list</a></menuitem>
               <menuitem>
                  <a><br> Posts</a>
                  <menu>
                  <menuitem><a href="../Admin/event.php" >Events</a></menuitem>
                       <menuitem><a href="../Admin/job.php" >Jobs</a></menuitem>
                       <menuitem><a href="../Admin/scholarship.php" >Scholarships</a></menuitem>
                       <menuitem><a  href="../Admin/topic.php" >Topics</a></menuitem>
                       <menuitem><a href="../Admin/question.php" >Questions</a></menuitem>
                  </menu>  
               </menuitem>
          <menuitem><a  href="../Admin/DonorTable.php"> Donations</a></menuitem>
          <menuitem><a  href="../Admin/addnews.php"> Add news</a></menuitem>
          <menuitem><a  href="../Admin/AddAlumni.php"> Add Alumni</a></menuitem>
          <menuitem><a href="../Admin/Admin/mentor.php">Mentorship program</a></menuitem>
          <menuitem><a href="../Admin/managenews.php">Manage news</a></menuitem>
          <!--<menuitem><a href="../Admin/posts mangment.php">Manage posts</a></menuitem>-->
          <menuitem id="demo2">
            <a><br>More</a>
            <menu>
            <menuitem><a href="../Both/login.php">Login</a></menuitem>
            <menuitem><a href="../Both/logout.php">Log out </a></menuitem>
            </menu>
          </menuitem>
        </menu>
    
  </nav>


  <?php

 
$con = new PDO("mysql:host=localhost;dbname=alumniproject",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `user` WHERE firstName = '$str' or lastName = '$str' or email = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
  
  while($row = $sth->fetch())
	{
		?>

		<table border="2"style="width:40%border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); margin-left:75%;z-index: 100; " >
			<tr style="background-color: #1b3175;color: #ffffff;text-align: left;">
				<th>Name</th>
				<th>email</th>
			</tr>
			<tr style="border-bottom: 1px solid #dddddd; background-color: #f3f3f3;font-weight: bold;
    color:  #1b3175;">
				<td style="padding: 12px 15px;"><?php echo $row->firstname.$row->lastname; ?></td>
				<td style="padding: 12px 15px;"><?php echo $row->email;?></td>
			</tr>

		</table>
<?php 
	}
		

}

?>