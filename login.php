<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body
        {
            background-image:url('piano2.jpg');
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:center;
            background-size:cover;
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
	<div class="alert alert-success">
		<h2>Login</h2>
	</div>
	<hr>
	<form method="POST" name="frm" >
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" class="form-control" name="t1" placeholder="Enter email" id="email">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" class="form-control" name="t2" placeholder="Enter password" id="pwd">
	  </div>
	  <div class="form-group form-check">
	    <label class="form-check-label">
	      <input class="form-check-input" type="checkbox"> Remember me
	    </label>
	  </div>
  		<button type="submit" name="btn" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php 

	if(isset($_POST['btn']))
	{
		$eml = $_POST['t1'];
		$pss = $_POST['t2'];

		$con = new Mysqli("localhost","root","","student");

		if($con->connect_error) die($con->connect_error);
		else
		{
		$sql = "select * from student_details where email='$eml' and pass='$pss'";

			$res = $con->query($sql);

			if($rows = $res->fetch_assoc())
			 {
				$_SESSION['USER'] = $rows['username'];
				$_SESSION['userID'] = $rows['Id'];
				$_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
				date_default_timezone_set('ASIA/KOLKATA');
				$_SESSION['login_time'] = date('d-m-y h:i:sA');
				header("location:schedule.php");
			}
			else
			{
				echo "<h1 style='color:red;text-align:center;'>Worng Username or Password</h1>";
			}

		}
		$con->close();
	}
 ?>
</body>
</html>