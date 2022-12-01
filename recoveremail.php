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

<?php

include 'dbcon.php';


if(isset($_POST['submit']))
{
	
	$email=mysqli_real_escape_string($con ,$_POST['email']);
	
	$emailquery ="select * from registration where email='$email'";
	$query=mysqli_query($con,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount)
	{
		$userdata=mysqli_fetch_array($query);

		$username=$userdata['username'];
		$token=$userdata['token'];

		$subject ="Password Reset";
		$body="Hi, Click here to activate your account 
		http://localhost:8080/pink/resetpwd.php?token=$token";
		$sender_email="From:menstrualredweek@gmail.com";

		if(mail($email,$subject,$body,$sender_email))
		{
			 $_SESSION['msg'] = "check your mail to reset your password $email";
			header('location:login.php');		
	  }
	  else
	  {
		echo "email sending failed..";
	   }
	
			
	}		
	else
	{
		echo "no email found";
	}
	
}

?>

<div class="card-bg-light">
<article class = "card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center"> Recover Your Account </h4> 
<p class="text-center">Enter your proper email address </p>


<form action=  " <?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="POST" autocomplete="off">


	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-envelope"></i></span>
		</div>
       <input name="email" class="form-control" placeholder="Email address" type="email" required>
	</div><!--form group-->
	

    <div class="form-group">
    	<button type="submit" name="submit" class="btn btn-primary btn-block">Send Mail</button>
    </div><!--form group-->

    <p class="text-center"> Have an account? <a href="login.php">Log In</a></p>
</form>
</article>
</div><!--card-->


</body>
</html>




