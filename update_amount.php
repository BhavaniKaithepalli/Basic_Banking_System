<?php
	session_start();
	$con=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($con,"bank");
	echo "<body style='background: url(w2.jpg); background-position: center;
 	 background-repeat: no-repeat; background-size: cover;'>";

	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];
	//sender money
	$sql = "SELECT Current_balance FROM customers WHERE Name = '$sender'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script type='text/javascript'>alert('Data Invalid')</script>";
		die("");
	}
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$amount_of_sender = $row["Current_balance"];
	//receiver money
	$sql = "SELECT Current_balance FROM customers WHERE Name = '$receiver'";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$amount_of_receiver = $row["Current_balance"];
	session_destroy();
	$amount = $_POST["transfer"];
	if($amount_of_sender >= $amount)
	{
		$sender_amount = $amount_of_sender - $amount;
		$sql = "update customers set Current_balance = $sender_amount where name='$sender'";
		$result = mysqli_query($con,$sql);

		$receiver_amount = $amount_of_receiver + $amount;
		$sql = "update customers set Current_balance = $receiver_amount where name='$receiver'";
		$result = mysqli_query($con,$sql);

		$sql = "insert into transactions(Sender,Receiver,Amount,Time) values('$sender','$receiver',$amount,now())";
		$result = mysqli_query($con,$sql);

		$msg = "Transaction Successful";
		echo "<script type='text/javascript'>alert('$msg')</script>";

		include 'view_customers.php';
	}
	else
	{
		$msg = "Insufficient Balance";
		echo "<script type='text/javascript'>alert('$msg')</script>";
		include 'view_customers.php';
	}
?>