<!DOCTYPE html>
<html>
<head>
	<title>View All Transactions</title>
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
			width: 800px; 
			line-height: 40px;
			border: 5px solid black;
		}
	</style>

	<form method="POST" action="index.php">
	<button class="btn"><i class="fa fa-home"></i> Home</button>
    </form>
	<br>
	<?php
	include("connection.php");
	$query="select * from transactions";
	$result=mysqli_query($con,$query);
	echo "<body style='background: url(b10.jpg);'>";
	if(mysqli_num_rows($result)>0)
	{ 
		echo "<center><div>";
		echo "<table border='5'>";
		echo "<tr>";
			echo "<th colspan='5'><h2>All Transactions</h2></th>";
		echo "</tr>";
		echo "<t>";
			echo "<th>Sno</th>";
			echo "<th>Sender</th>";
			echo "<th>Receiver</th>";
			echo "<th>Amount</th>";
			echo "<th>Time</th>";
		echo "</t>";
			while($row=mysqli_fetch_assoc($result))
			{
			echo "<tr>
				<td>".$row['Sno']."</td>
				<td>".$row['Sender']."</td>
				<td>".$row['Receiver']."</td>
				<td>".$row['Amount']."</td>
				<td>".$row['Time']."</td>
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
