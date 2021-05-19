<?php
include("connection.php");
session_start();
$data=$_POST['name'];
$sql="select Name from customers where NOT Name='$data'";
$result=mysqli_query($con,$sql);
echo "<body style='background: url(pic10.jpg); background-position: center;
  background-repeat: no-repeat; background-size: cover;'>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transfer Money</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="view.css">
	<style>
		th{
			font-size: 35px;
		}
		td{
			font-size: 25px;
		}
		th:hover {
			background-color: #669900;
		}
		td:hover {
			background-color: #006666;
		}
	</style>
	<script type="text/javascript">
		function send() {
			// body...
			var a = document.getElementById("sender").value;
			var arr = ["Bhavani","Supriya","Priya","Tulasi","Sailaja","John","Ram","Alfred","Tony","Mark"];
			var index = arr.indexOf(a);
    		if (index > -1) 
        		arr.splice(index, 1);
        	var str = "";
        	for (var i = 0; i < arr.length; i++) 
        		str = str +"<option value="+arr[i]+">"+arr[i]+"</option>";
        	
        	document.getElementById("receiver").innerHTML = str;
		}
	</script>
</head>
<body>
	<form method="POST" action="index.php">
	<button class="btn"><i class="fa fa-home"></i> Home</button>
    </form>
	<div class="transfer">
	<form method="post" action="update_amount.php">
	<table class="table" align="center" border="2" cellpadding="14" cellspacing="14">
	<th colspan="2">Money Transaction</th>
	<tr><td><b>Receiver Name :</b></td>
	<td>
		<select id="receiver" name="receiver" style="width: 150px; height: 30px; font-size: 18px;" required>
		<option selected>Select Receiver</option>
		<?php
			while ($row = $result->fetch_assoc()) 
			{
				$uname1 = $row['Name'];
				echo "<option value=$uname1 name='name'>";
				echo $uname1;
				echo "</option>";
			}
		?>
	</select>
	</td>
	</tr>
	<tr><td><b>Amount :</b></td>
		<td>
		<input type="number" min="1" name="transfer" placeholder="Enter Amount" style="width: 150px; height: 30px; font-size: 18px;" required>
		</td>
	</tr>
	<tr><td colspan="2">
		<center><?php echo "<button name='sender' value=$data class='btn'>Send Money</button>";?></center>
	</td></tr>
</form>
</div>
</table>
</body>
</html>
