<!DOCTYPE html>
<html>
<head>
	<title>View Customers</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="view.css">
</head>

<body>
	<style>
		th:hover {
			background-color: #ffffff;
		}
		h2{
			text-align: center;
		}
		th{
			font-size: 25px;
			text-align: center;
		}
		td{
			font-size: 20px;
			text-align: center;
		}
		td:hover {
			background-color: #ffffff;
		}
		table{
			width: 700px; 
			line-height: 30px;
			border: 5px solid black;
		}
	</style>

	<form method="POST" action="index.php">
	<button class="btn"><i class="fa fa-home"></i> Home</button>
    </form>
	<br>
	<?php
	include("connection.php");
	$query="select * from customers";
	$result=mysqli_query($con,$query);
	echo "<body style='background: url(c2.jpg); background-position: center;
 	 background-repeat: no-repeat; background-size: cover;'>";
	if(mysqli_num_rows($result)>0)
	{ 
		echo "<center><div>";
		echo "<table border='5'>";
		echo "<tr>";
			echo "<th colspan='5'><h2>Customer Details</h2></th>";
		echo "</tr>";
		echo "<t>";
			echo "<th>Sno</th>";
			echo "<th>Name</th>";
			echo "<th>Email</th>";
			echo "<th>Current balance</th>";
			echo "<th>Action</th>";
		echo "</t>";
			while($row=mysqli_fetch_assoc($result))
			{
				$id = $row['Name'];
			echo "<tr>
				<td>".$row['Sno']."</td>
				<td>".$row['Name']."</td>
				<td>".$row['Email']."</td>
				<td>".$row['Current_balance']."</td>
				<form action='display_user.php' method='post'>
				<td><Button type='submit' name='name' value=$id class='btn'>View</Button></td>
				</form>
			</tr>";
			}
			echo "</table></div></center>";
		}
		else
			echo "0 results";
		mysqli_close($con);
		?>
</body>
</html>
