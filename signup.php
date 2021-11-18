<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			background-image: url('drums.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			background-attachment: fixed;
		}
		label
		{
			color: lightgoldenrodyellow;
			font-size: 20px;
		}
		input
		{
			max-width: 70%;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="display-3" style="color:lightskyblue;">Darwin Mabasa Music Academy</h1>
		<hr>
		<div class="alert alert-primary">
			<h2>Registration Form</h2>
		</div>
		<hr>
		<form name="frm" method="post">
		<div class="form-group">
		   <label>Full Name:</label>
		    <input type="text" class="form-control" name="t1" placeholder="Enter name">
  	   </div>
	   <div class="form-group">
		 <label>Username :</label>
		 <input type="text" class="form-control" name="t2" placeholder="Enter Username">
	   </div>
	  <div class="form-group">
		 <label>Email-ID :</label>
		 <input type="email" class="form-control" name="t3" placeholder="Enter email-id">
	  </div>
	   <div class="form-group">
		 <label>Password :</label>
		 <input type="password" class="form-control" name="t4" placeholder="Enter Password">
	  </div>
  	<button type="submit" name="btn" class="btn btn-primary">Submit</button>
  	<button type="reset" class="btn btn-danger">Reset</button>
	</form>
	</div>
	<?php 

		if(isset($_POST['btn']))
		{
			$fname = $_POST['t1'];
			$uname = $_POST['t2'];
			$email = $_POST['t3'];
			$pass = $_POST['t4'];

			$con = new Mysqli("localhost","root","","student");

			if($con->connect_error) die($con->connect_error);
			else
			{
				$sql = "insert into student_details(fname,username,email,pass) values('$fname','$uname','$email','$pass')";

				$con->query($sql);

				$r = $con->affected_rows;

				if($r==1) header("location:personal.php");
				else echo "Error";

				$con->close();
			}
		}
	 ?>
</body>
</html>