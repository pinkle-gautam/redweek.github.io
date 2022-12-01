<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> </title>

<!--links-->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!--Font link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'style.php' ?>


</head>
<body onload="myfun()" STYLE="background-image:url(pink8.jpg);">


<!--PHP-->

<?php
include 'dbcon.php';


if(isset($_POST['submit']))
{
	
	if(isset($_GET['token']))
	{
      $token=$_GET['token'];
	

	$newpassword=mysqli_real_escape_string($con ,$_POST['password']);
	$cpassword=mysqli_real_escape_string($con ,$_POST['cpassword']);

	$pass=password_hash($newpassword, PASSWORD_BCRYPT);
	$cpass=password_hash($cpassword, PASSWORD_BCRYPT);


		if($newpassword === $cpassword)
		{
				$updatequery="update registration set password='$pass'";

		   	$iquery = mysqli_query($con, $updatequery);

			if($iquery)
			{
				$_SESSION['msg'] = " your password has been updated";
				header('location:login.php');
			}
		 else
		 {
			   $_SESSION['passmsg'] = "your password is not updated" ;
			   header('location:resetpwd.php');
		 }
	 }
	
	else
	{
    $_SESSION['passmsg']="passwords are not matching"; 
	
	}  


 }

   else 
  {
	echo "no token";
   }

}


?>

<div class="card-bg-light">
<article class = "card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center"> Create Account </h4> 
<p class="text-center">Get started with your free account </p>

<p class="bg-info text-white px-5"> 
	<?php 
	    if(isset($_SESSION['passmsg']))
    {
       echo $_SESSION['passmsg'];
    }
    else
    {
	    echo $_SESSION['passmsg'] = "";
	  }
	     ?> </p>
    


<form action= " "  method="POST">
	


	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-lock"></i></span>
		</div>
       <input class="form-control" placeholder="New Password" type="password" name="password" value="" required>
	</div><!--form group-->

	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-lock"></i></span>
		</div>
       <input class="form-control" placeholder="Confirm Password" type="password" name="cpassword"  required>
	</div><!--form group-->

    <div class="form-group">
    	<button type="submit" name="submit" class="btn btn-primary btn-block">Update password</button>
    </div><!--form group-->

    <p class="text-center"> Have an account? <a href="login.php">Log In</a></p>
</form>
</article>
</div><!--card-->




</body>
</html>

