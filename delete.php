<?php 
$id = $_GET['id'];
$con = new Mysqli("localhost","root","","admin");
if ($con->connect_error) die($con->connect_error); 
else
{
	$sql = "delete from sschedule where ID=$id";
	$con->query($sql);
	$r = $con->affected_rows;

	$con->close();

	if($r==1) {

		header('location:schedule2.php');

		$to = "ishanmalani@gmail.com";
		$subject = "Slot Deletion";
		$txt = "Hello your slot is deleted";
		$headers = "From : soumik.manna10@gmail.com";

		mail($to, $subject, $txt, $headers);
	}

	else echo "Error!!";
}
?>