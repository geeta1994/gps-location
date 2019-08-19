<?php
$conn=mysqli_connect('localhost','root','','google');
	if($conn){
		echo "connected successfully";
	}
	else{
		echo $conn->error;
	}
	?>
