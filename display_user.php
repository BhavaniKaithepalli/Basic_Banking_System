<!DOCTYPE html>
<html>
<head>
	<title>Display customer details</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="view.css">
	<link rel="stylesheet" href="index.css">

	<?php
	include("connection.php");
	$data=$_POST['name'];
	$query="select * from customers where Name='$data'";
	if(!mysqli_query($con,$query))
		die("Failed ".mysqli_error($con));
		$row = mysqli_query($con,$query);
		$result = mysqli_fetch_array($row);
		$uname = $result["Name"];
		$id = $result["Sno"];
		$email = $result["Email"];
		$balance = $result["Current_balance"];
	echo "<body style='background: url(pic9.jpg); height: 100%;'>";
	?>
</head>
<body>
	<style>
		th{
			font-size: 25px;
		}
		td{
			font-size: 20px;
			text-align: center;
		}
	</style>
	<table class="table table-striped table-hover"><tr>
	<td><form method="POST" action="index.php">
		<button class="btn"><i class="fa fa-home"></i> Home</button>
    </form></td>
    <td><form method="POST" action="view_customers.php">
    	<button class="btn"><i class="previous"></i>Previous</button>
    </form></td>
	</tr></table>
	<br>
	<table class="usertable" align="center" border="5" style="width: 500px; line-height: 30px; border: 5px solid black;">
		<tr>
			<th colspan="4" style="font-size: 20px;"><h2>Customer Details</h2></th>
		</tr>
		<t>
			<th>Sno</th>
			<th>Name</th>
			<th>Email</th>
			<th>Current balance</th>
		</t>
		<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $uname ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $balance ?></td>
		</tr>
	</table>
	<br><br><br><br>
	<form method="POST" action="transfer_amount.php">
	<div class="container">
		<?php
  		echo "<Button class='btn' type='submit' name='name' value=$uname>Transfer Money</Button>";
  		?>
	</div> 
	</form>
</body>
</html>