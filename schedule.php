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
        label{
        	color: Chartreuse;
        	font-size: 20px;
        	margin-top: 100px;
        	font-family: verdana;
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
				<a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
			</div>
	<?php 
		}
		else header("location:login.php");
	 ?>

	 <div class="container">
	<table class="table table-bordered table-secondary">

	<caption style="caption-side: top; text-align: center; font-size: 30px; color: darkmagenta; font-weight: bold; background-color: lightskyblue;">Booked Schedules(If you choose the same slot it will be cancelled)</caption>
	<tr>
		<th>Status</th>
		<th>Time</th>
		<th>Date</th>
		
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
				<td><?php echo $rows['SStatus'];?></td>
				<td><?php echo $rows['Stime'];?></td>
				<td><?php echo $rows['Sdate'];?></td>
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

	 <form name="frm" method="post">
	 	<label>Name : </label> <input type="text" name="t1" class="form-control">
	 	<br>
		 <table border="2" class="table table-bordered table-secondary table-hover" height="600" width="100%" style="text-align: center;">
		 	<tr rowspan=>
		 		<td class="display-4">Times</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="11-12" class="form-check-input">
		 			11-12
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="12-1" class="form-check-input">
		 			12-1
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="1-2" class="form-check-input">
		 			1-2
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="2-3" class="form-check-input">
		 			2-3
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="3-4" class="form-check-input">
		 			3-4
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="4-5" class="form-check-input">
		 			4-5
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="5-6" class="form-check-input">
		 			5-6
		 			
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="6-7" class="form-check-input">
		 			6-7
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="time" value="7-8" class="form-check-input">
		 			7-8
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			Status
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="status" value="confirmed" class="form-check-input">Confirmed
		 		</td>
		 	</tr>
		 	<tr>
		 		<td class="display-4">
		 			<input type="radio" name="status" value="possibly" class="form-check-input">Possibly
		 		</td>
		 	</tr>
		 </table>

		 <label>Date : </label>
		 <input type="date" name="t2" class="form-control">
		 <br>
		 <button name="btn" class="btn btn-success" style="float:right">Submit</button>

	</form>
	<?php 

		if(isset($_POST['btn']))
		{
			$sname = $_POST['t1'];
			$stime = $_POST['time'];
			$sdate = $_POST['t2'];
			$sstatus = $_POST['status'];

			// $chk='';
			$con = new Mysqli('localhost','root','','admin');
			if($con->connect_error) die($con->connect_error);
			else
			{
				// foreach($stime as $chk)
				// {
				// 	$chk .=$chk."";
				// }

				$sql = "insert into sschedule(Sname,Stime,Sdate,SStatus) values('$sname','$stime','$sdate','$sstatus')";

				$con->query($sql);

				$r = $con->affected_rows;

				if($r==1)
				{
					echo "<script>alert('Slot Booked');</script>";
				}
				else
				{
					echo "<script>alert('Error');</script>";
				}
				$con->close();
			}
		}

	 ?>
</div>
</body>
</html>