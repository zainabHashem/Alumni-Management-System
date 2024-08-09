<?php
require_once '../../Controllers/DonationController.php';
require_once '../../Models/donation.php';
$DonationController =new DonationController;
//$Donations = $DonationController->donationForm();
$TotalAmount = $DonationController->totalAmount();

$errMsg="";
if (isset($_POST['amount']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) ) {
    if (!empty($_POST['amount']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone'])){
    $amount = filter_input(INPUT_POST,"amount",FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST,"phone",FILTER_SANITIZE_NUMBER_INT);
    $paymentmethod = $_POST['paymentmethod'];
    $donor = new Donation;
    $donor->setAmount($amount);
    $donor->setPaymentMethod($paymentmethod);
    $donor->setPhone($phone);
    $id=$_SESSION["userId"];
    $donor->setId($id);
    if ($DonationController->donationForm($donor)) {
        header("location: Donation.php");
    }
    else
    {
        if(!isset($_SESSION["id"]))
        {
            session_start();
        }
        $errMsg=$_SESSION["errMsg"];
    }
    }
    else
    {
        $errMsg="ERROR !! Please fill all fields...!";
    }
}


?>





<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/master.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
  <div class="container">
  <a href="../Alumni/news.php" style="text-decoration: none; display: inline-block;padding: 8px 16px; 
      background-color: #a486cf;color: black;">&laquo; Previous page</a>
      <br><br>
    <div class="title">Donation Form</div>
    

    <div class="content">
    <?php 
            if($errMsg!="")
            {
                ?>
                    <div> <?php echo $errMsg ?></div>
                <?php
            }
            
            ?>
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="firstname" placeholder="Enter your first name" >
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text"name="lastname" placeholder="Enter your last name" >
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text"name="phone" placeholder="Enter your number"  >
          </div>
          <div class="input-box">
            <span class="details">Amount</span>
            <input type="text" name="amount" placeholder="$$$$" >
          </div>
        </div>
        <div class="payment method-details">
          <input type="radio" name="paymentmethod" checked="checked" value="Credit card"  id="dot-1" >
          <input type="radio" name="paymentmethod" value="Cash" id="dot-2" >
          <input type="radio" name="paymentmethod" value="Mobile payment" id="dot-3" >
          <span class="payment method-title">Payment Method</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="payment method">Credit Card</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="payment method">Cach</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="payment method">Mopile Payment</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</body>
</html>