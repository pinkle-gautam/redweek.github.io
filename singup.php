<!DOCTYPE html>
<html>
<head>
<title> </title>
</head>

	<body onload="myfun()" STYLE="background-image:url(pink3.jpg);">
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

<form  autocomplete="off">
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
       <input class="form-control" placeholder="Repeat Password" type="password" name="password"  required>
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













