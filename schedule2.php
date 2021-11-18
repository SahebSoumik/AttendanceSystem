<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
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
            background-image:url('drumsimg.jpg');
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:center;
            background-size:cover;
        }
	</style>
</head>
<body>
<div class="container">
	<?php 
		if(isset($_SESSION['USER']))
		{
	?>
			<div style="float:right;margin: 10px;">
				<h4 style="color:cyan;">Welcome <?php echo $_SESSION['USER'];?></h4>
				<a href="logout2.php" class="btn btn-sm btn-danger">Logout</a>
			</div>
	<?php 
		}
		else header("location:login.php");
	?>

<table class="table table-bordered table-secondary table-hover" style="height: 600px;width: 100%; text-align:center;">

	<caption style="caption-side: top; text-align: center; font-size: 30px; color: darkmagenta; font-weight: bold; background-color: lightskyblue;">ADMIN PORTAL</caption>
	<tr>
		<th>Student Name</th>
		<th>Time</th>
		<th>Date</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php 

		$con = new Mysqli('localhost','root','','admin');

		if($con->connect_error) die($con->connect_error);

		else
		{
			$sql = "select * from sschedule";

			$res = $con->query($sql);

			while($rows = $res->fetch_assoc())
			{
	?>
			<tr>
				<td><?php echo $rows['Sname'];?></td>
				<td><?php echo $rows['Stime'];?></td>
				<td><?php echo $rows['Sdate'];?></td>
				<td><?php echo $rows['SStatus'];?></td>
				<td><a href="delete.php?id=<?php echo $rows['ID'];?>">Delete</a></td>
			</tr>
	<?php
			}
			$con->close();
		}
	 ?>
</table>
<div>
	<ul class="pagination">
		<li class="page-item active"><a href="#" class="page-link ">1</a></li>
		<li class="page-item"><a href="#" class="page-link">2</a></li>
		<li class="page-item"><a href="#" class="page-link">3</a></li>
	</ul>
</div>
</div>
</body>
</html>
