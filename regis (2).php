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
<body>

<!--PHP-->

<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
	$username= mysqli_real_escape_string($con ,$_POST['username']);
	$email=mysqli_real_escape_string($con ,$_POST['email']);
	$mobile=mysqli_real_escape_string($con ,$_POST['mobile']);
	$password=mysqli_real_escape_string($con ,$_POST['password']);
	$cpassword=mysqli_real_escape_string($con ,$_POST['cpassword']);

	$pass=password_hash($password, PASSWORD_BCRYPT);
	$cpass=password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquery ="select * from registration where email='$email'";
	$query=mysqli_query($con,$emailquery);

	$emailcount = mysqli_num_rows($query);

if(empty($username))
{
	?>
		<script>
		alert("Please Enter  your name");
		</script>
		<?php
}
if(!preg_match("/^[a-zA-Z\s]+$/",$username))
{
	?>
		<script>
		alert("Please Enter Name in String Format");
		</script>
		<?php
}
if(!preg_match("/^[0-9]+$/",$mobile))
{
	echo "Only Mobile Number";
}
if(strlen($mobile)<11)
{
	?>
		<script>
		alert("Please Enter Proper Mobile Number");
		</script>
		<?php
}
if(strlen($mobile)>11)
{
	?>
		<script>
		alert(" your mobile number is too large");
		</script>
		<?php
}

	if($emailcount>0)
	{
		?>
		<script>
		alert("email already exists");
		</script>
		<?php

	}
	else
	{
		if($password === $cpassword)
		{
			$insertquery="insert into registration(username,email,mobile,password,cpassword) values ('$username','$email','$mobile','$pass','$cpass')";

			$iquery=mysqli_query($con,$insertquery);

			if($con)
			{
				?>
				<script>
					alert(" Password inserted Successful");
				</script>
				<?php
			}
		 else
		 {
			     ?>
				<script>
					alert("Password not Inserted Successful");
				</script>
				<?php
		 }
	   }
	
	  else
	  {
		 ?>
				<script>
					alert("passwords are not matching");
				</script>
				<?php
	  }

   }




}


?>

<div class="card-bg-light">
<article class = "card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center"> Create Account </h4> 
<p class="text-center">Get started with your free account </p>

<p>
<a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i>Login via Gmail</a>

<a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>Login via Facebook</a>
</p>

<p class="divider-text">
	<span class="bg-light">OR</span>
</p>

<form action=""  method="POST">
	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-user"></i></span>
		</div>
		<input name="username" class="form-control" placeholder="Full name" type="text" required>
	</div><!--form group-->


	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-envelope"></i></span>
		</div>
       <input name="email" class="form-control" placeholder="Email address" type="email" required>
	</div><!--form group-->



	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-phone"></i></span>
		</div>


       <input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
       		<?php
		
function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
?>
	</div><!--form group-->



	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-lock"></i></span>
		</div>
       <input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
	</div><!--form group-->

	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text"> <i class="fa fa-lock"></i></span>
		</div>
       <input class="form-control" placeholder="Repeat Password" type="password" name="cpassword"  required>
	</div><!--form group-->

    <div class="form-group">
    	<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
    </div><!--form group-->

    <p class="text-center"> Have an account? <a href="login.php">Log In</a></p>
</form>
</article>
</div><!--card-->
</div>
</div>
</div>

</body>
</html>













