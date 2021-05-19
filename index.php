<?php
echo "<body style='background: url(bank1.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;'>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bank</title>
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="view.css">
</head>
<body>
	<form method="POST" action="http://localhost/bank/">
	<button class="btn"><i class="fa fa-home"></i> Home</button>
    </form>
	<div>
		<h1 style="color: black;text-align: center; font-size: 250%;">
			<img src="icon.png" width="45" height="45">
			Sparks Banking System
		</h1>
	</div>
    <br><br><br><br>

    <form method="POST" action="view_customers.php">
	<div class="container">
  		<button class="btn">View Customers</button>
	</div> 
	</form>
	<br><br>
	<form method="POST" action="transact.php">
	<div class="container">
  		<button class="btn">All Transactions</button>
	</div>
	</form>
</body>
</html>
