


<?php 
include('bpdbconnection.php');
session_start();
error_reporting(0);
include('bpdbconnection.php');
if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
  
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime) value('$aptnumber','$name','$email','$phone','$adate','$atime')");
    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='index4.php'</script>";  
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<html>
<head>
    <meta charset="utf-8">

    <title>first period</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--footer  -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="bp.css">
     <link rel="stylesheet" href="datepicker.css">
    <link rel="stylesheet" href="timepicker.css">

    
</head>
<body> 


    <!--heading-->
     
 <?php include_once('head.php');?>

<br>
    <section class="ftco-section ftco-no-pt ftco-booking">
      <div class="container-fluid px-0">
        <div class="row no-gutters d-md-flex justify-content-end">
          <div class="one-forth d-flex align-items-end">
            <div class="text">
              <div class="overlay"></div>
              <div class="appointment-wrap">
                <span class="subheading">Reservation</span>
                <h3 class="mb-2">Make an Appointment</h3>
                <form action="#" method="post" class="appointment-form" autocomplete="off">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required="true">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="email" class="form-control" id="appointment_email" placeholder="Email" name="email" required="true">
                      </div>
                    </div>
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" class="form-control appointment_date" placeholder="Date" name="adate" id='adate' required="true">
                      </div>    
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" class="form-control appointment_time" placeholder="Time" name="atime" id='atime' required="true">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Make an Appointment" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="one-third">
            <div class="img" style="background-image: url(cons.jpg);">
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <br>


  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


 <?php include_once('foot.php');?>


    
</body>
</html>

    
