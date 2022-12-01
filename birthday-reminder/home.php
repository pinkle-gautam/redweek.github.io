<?php 
	session_start();
	require("config.php");
	
	
	
	$users=[];
	$current_month_day=date("m-d");
	$current_year=date("Y");
	#Select today birthday users
	$sql="select * from users where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}' and WISH_YEAR<>'{$current_year}'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$users[]=$row;
		}
	}
	
	#Send birthday wishes to Mail
	foreach($users as $user){
		



		$to = $user["EMAIL"];

		$subject = " PERIOD REMINDER";

		$message = "<h3>HEY {$user["NAME"]} your Periods are arriving soon!</h3>
		  Check the given link below for healthy period tips !
		 http://localhost:8080/pink/tipsforbetterperiod.php";

		$header="From:user@domain.in"."\r\n";
		$header.="X-Mailer:PHP/".phpversion()."\r\n";
		$header.="Content-type:text/html; charset=iso-8859-1";  

		$response=mail($to,$subject,$message,$header);
		
		if($response==true){
			$sql="update users set WISH_YEAR='{$current_year}'  where ID='{$user["ID"]}'";
			$con->query($sql);
		}else{
			echo "Mail send Failed!!!";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";?>
	<body onload="myfun()" STYLE="background-image:url(pink8.jpg);"> 











		<?php include "navbar.php"; ?>
		<div class='container mt-4'>
			<div class='row'>
				
				<div class='col-md-4'>
					<?php foreach($notifications as $row):?>
					  <div class="alert alert-primary mb-3 pt-4 pb-4" href="#"><?php echo $row; ?></div>
					<?php endforeach;?>
				</div>
				<div class='col-md-8'>
					
						<h1 class="display-4"></h1>
						<img src="">
						
					
				</div>
			</div>
		</div>
	</body>
</html>