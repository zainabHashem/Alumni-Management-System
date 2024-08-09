<?php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/src/Exception.php';
require_once '../../Models/email.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../../Controllers/emailController.php';
 $sendmail = new PHPMailer(true);
$alert = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
            $emailcontroller = new emailController;
            $mail = new Contact;
            $mail->setfirstname($_POST['firstname']);
            $mail->setlastname($_POST['lastname']);
            $mail->setEmail($_POST['email']);
            $mail->setSubject($_POST['subject']);
            $mail->setMessage($_POST['message']);
            $id = $_SESSION["userId"] ;
            $mail->setId($id);
            try {
                // send email message
                $sendmail->isSMTP();
                $sendmail->Host = 'smtp.gmail.com';
                $sendmail->SMTPAuth=true;
                $sendmail->Username = 'saraomar1712004@gmail.com';
                $sendmail->Password = 'jabvozqxjrniamww';
                $sendmail->SMTPSecure = "tls";
                $sendmail->Port = '587';
                $sendmail->setFrom('saraomar1712004@gmail.com', 'BMT');
                $sendmail->addAddress('saramahmoud172008@gmail.com');//where i want to receive temporary
                $sendmail->isHTML(true);
                $name = $mail->getfirstname();
                $email = $mail->getEmail();
                $subject=$mail->getSubject();
                $message=$mail->getMessage();
                $sendmail->Subject='Message recieve from contact:' .$name ;
                $sendmail->Body = "Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message ";
                $sendmail->send();
                $alert = "<div class='alert-success'><span>Message sent. THANKS!!</span></div>"; 
            } catch (Exception $e) {

                $alter = "<div class='alert-error'><span>' " .$e->getMessage();"   '</span></div>";
            }
            if ($sendmail->send()) {
                $alert = "<div class='alert-success'><span>Message sent. THANKS!!</span></div>";
            } else {
                $alert = "<div class='alert-error'><span>Message not sent. Please try again later.</span></div>";
            }
            if ($emailcontroller->emailForm($mail)) {
                header("location: emailform.php");
            }

        } else {
            $errMsg = "ERROR !! Please fill all fields...!";
        }
    }
}




?>

<!doctype html>
<html lang="en">

    <head>
        <title>Contact Form 04</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/emailstyle.css">
<!-- Layout style -->
<link rel="stylesheet" href="../Layout/layout.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>
    </head>

    <body>
    <?php include( '../Layout/alumniheader.php'); ?>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Contact Us</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="contact-wrap w-100 p-lg-5 p-4">
                                        <h3 class="mb-4">Send us a message</h3>
                                        <div id="form-message-warning" class="mb-4"></div>
                                        <div id="form-message-success" class="mb-4">
                                            Your message was sent, thank you!
                                        </div>
                                        <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="firstname" id="name"
                                                            placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="lastname" id="name"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject"
                                                            id="subject" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" id="message"
                                                            cols="30" rows="6" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input name="submit" type="submit" value="Send Message"
                                                            class="btn btn-primary">
                                                            <?php echo $alert;  ?>
                                                        <div class="submitting"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                
                                 <div class="col-md-6 d-flex align-items-stretch">
                                    <div class="info-wrap w-100 p-lg-5 p-4 img">
                                        <h3>Contact us</h3>
                                        <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-map-marker"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY
                                                    10016</p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-phone"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-paper-plane"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Email:</span> <a
                                                        href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-globe"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/main.js"></script>
<!-- Layout js -->
<script src="../Layout/layout.js"></script>
    </body>

</html>