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
<?php include( '../Layout/adminheader.php'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Admin/AlumniList.php">Home</a></li>
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

            <!-- Profile card -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Sarah Ahmed</h3>

                <p class="text-muted text-center">Software Engineer at MicrosoftBing | with 5+ years experience in building responsive websites with HTML,CSS,SASS,JavaScript,JQuery | Passionate about clean code and get things done.         
                <div class="ico" style="flex-direction: row; display:flex;  margin-top:5%;">               
                  <a href="#" class="btn btn-primary btn-block" style="width: 40%; height: 5%; margin-right: 20%; " >
                    <ion-icon name="navigate-outline"style="font-size:13px;;"></ion-icon><b>Message</b></a>
                <div class="btn-group" >
                    <button type="button" class="btn btn-default"  style="padding: 6px 32px;" >More</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="#">Copy profile link</a>
                      <a class="dropdown-item" href="#">Save resume as pdf</a>
                      <a class="dropdown-item" href="#">About this profile</a>
                      <div class="dropdown-divider"> </div>
                      <a class="dropdown-item" href="#">Report/Block</a>              
                  </div>
                </div>      
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

                <p class="text-muted"style="margin-top: 5px; margin-left: 22px;;">
                  <img style=" width: 20px;" src="../Images/helwan.jpeg"/>&nbsp; Helwan University<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bachelor's of Computer Science<br>
                  <img style=" width: 20px;" src="../Images/iti.jpeg"/>&nbsp; Information Technology Institute (ITI)<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.NET Full Stack Development Diploma<br>
                  
                  
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"style="margin-top: 5px; margin-left: 22px;;">Cairo, Egypt</p>

                <hr>

                <strong><i class="fas fa-briefcase"></i> &nbsp;Experience</strong>

                <p class="text-muted" style="margin-top: 5px; margin-left: 22px;;">
                
                  <img style=" width: 15px;" src="../Images/microsoft.png"/>&nbsp; Frontend Engineer<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Microsoft · Full-time  <br>
                  <img style=" width: 15px;" src="../Images/dxc.jpeg" />&nbsp;Senior Frontend Developer<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DXC Technology · Full-time<br>
                  <img style=" width: 15px;" src="../Images/grand.jpeg" />&nbsp;Junior FrontEnd Developer<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grand Technology · Full-time
              
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted" style="margin-top: 5px; margin-left: 22px;;">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">CSS</span>
                  <span class="tag tag-warning">JavaScript</span>
                  <span class="tag tag-primary">React.js</span>
                </p>

                <hr>
                <strong><i class="fas fa-hands-helping"></i> &nbsp; Volunteering</strong>

                <p class="text-muted" style="margin-top: 5px; margin-left: 22px;;">        
                  <img style=" width: 25px;" src="../Images/resala.jpeg" />&nbsp;Human Resources Specialist<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resala Charity Organization
                  <br>
                  <img style=" width: 25px;" src="../Images/mentor.jpeg" />&nbsp;Mentor<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Young Leaders Mentorship Program
                  </p>
                <hr>

                <strong><i class="fas fa-user-friends"></i>&nbsp; Events</strong>

                <p class="text-muted"  style="margin-top: 5px; margin-left: 22px;;">
                  <img style=" width: 25px;" src="../Images/conf.png" />&nbsp;Women in Tech Global Conference 2023<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Event by WomenTech Network<br>
                  <img style=" width: 25px;" src="../Images/osc.jpg" />&nbsp;OSC Hotaru 1.0<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Event by OSC AUC              
                </p>

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
                <strong><ion-icon name="logo-github"style="font-size:15px;"></ion-icon><a href="https://github.com//SarahAhmed/" target="_blank">&nbsp; &nbsp;https://github.com//SarahAhmed/</a></strong>
                <hr>
                <strong><ion-icon name="logo-linkedin"style="font-size:15px;"></ion-icon><a href="https://www.linkedin.com/in/SarahAhmed/"target="_blank">&nbsp; &nbsp;https://www.linkedin.com/in/SarahAhmed/</a></strong>
                <hr>
                <strong><ion-icon name="mail-outline"style="font-size:15px;"></ion-icon><a href="mailto: SarahAhmed@gmail.com"target="_blank">&nbsp; &nbsp;SarahAhmed@gmail.com</a></strong>
                <hr>
                <strong><ion-icon name="logo-twitter"style="font-size:15px;"></ion-icon><a href="https://twitter.com/SarahAhmed/"target="_blank">&nbsp; &nbsp;https://twitter.com/SarahAhmed/</a></strong>
                <hr>
                <strong><ion-icon name="logo-facebook"style="font-size:15px;"></ion-icon><a href="https://www.facebook.com/SarahAhmed/"target="_blank">&nbsp; &nbsp;https://www.facebook.com/SarahAhmed/</a></strong>
                
 
            
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
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Activity Log</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Account</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../dist/img/user4-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Sarah Ahmed</a>
                        
                          <button style=" background-color:#fff; border: none; margin-left: 950px; color: #7b7a7a;" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Copy post link</a>
                            <a class="dropdown-item" href="#">Save post to see later</a>
                           
                            <div class="dropdown-divider"> </div>
                            <a class="dropdown-item" href="#">Delete post</a>
                            <a class="dropdown-item" href="#">Report post</a>
                          </div>   
                        </span>
                        <span class="description">Posted a job application- 7:30 PM today</span>
                        

                      </div>
                      <!-- /.user-block -->
                      <p>
                        Microsoft is hiring Digital Verification Engineers.<br>Requirements - 2+ years of experience in ASIC / SoC verification with SV / UVM environments
                        <br>Apply now by filling the application form: <a href="https://aka.ms/atlc-engineeringprogram2022">https://aka.ms/atlc-engineeringprogram2023</a>

                        <br>Application deadline is June 15th, 2023.
                        

                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../Images/microsoft job.jpg" alt="Photo">
                        </div>
                      </p>
                      

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (3)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                 

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../dist/img/user4-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Sarah Ahmed</a>
                        
                          <button style=" background-color:#fff; border: none; margin-left: 950px; color: #7b7a7a;" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Copy post link</a>
                            <a class="dropdown-item" href="#">Save post to see later</a>
                           
                            <div class="dropdown-divider"> </div>
                            <a class="dropdown-item" href="#">Delete post</a>
                            <a class="dropdown-item" href="#">Report post</a>
                          </div>   
                        </span>
                        <span class="description">Posted a question- 3 days ago</span>
                        

                      </div>
                      <!-- /.user-block -->
                      <p>
                        Does anybody know how to check if this feature is activated? <br>I want to use this feature to also enabled certain code
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../Images/question.jpg" alt="Photo">
                        </div>
                      </p>
                      

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          20 April 2023
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"> You visited&nbsp;<a href="#">Menna Ashraf</a> &#39;s Profile
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <!-- timeline item -->
                      

                      <div>
                        <i class="fas fa-globe" style="background-color: #007bff; color: #fff;" ></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 7:30</span>

                          <h3 class="timeline-header">You postted a job application</h3>

                          <div class="timeline-body">
                            Microsoft is hiring Digital Verification Engineers.
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">View post</a>
                          <!--  <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
                          </div>
                        </div>
                      </div>


                      <!-- END timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>3:15</span>

                          <h3 class="timeline-header">You commented on <a href="#">Omar Mostafa</a> &#39;s post</h3>

                          <div class="timeline-body">
                            Yeah if you are in advisory or consulting at any firm, you are in a big trouble
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          17 April 2023
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-globe" style="background-color: #007bff; color: #fff;" ></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 3 days ago</span>

                          <h3 class="timeline-header">You postted a question</h3>

                          <div class="timeline-body">
                            Does anybody know how to check if this feature is activated?
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">View post</a>
                          <!--  <a href="#" class="btn btn-danger btn-sm">Delete</a>-->
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                     
             
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Bio">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Education"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Location"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Volunteering</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Volunteering"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Events</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Events"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Email Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Email Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Github Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Github Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Linkedin Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Linkedin Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Twitter Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Twitter Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Facebook Account</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Facebook Account"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Profile Picture</label>
                      
                        <input type="file" id="picture" name="picture">
                        
                      
                   </div>
                        <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Resume</label>
                      
                        <input type="file" id="picture3" name="picture3">
                  </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
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
</body>
<?php include ('../Layout/footer.php'); ?>
</html>
