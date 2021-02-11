<!DOCTYPE html>
<html>
<head>
	<title>Agent Index</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	session_start();
	echo "<h2> Welcome Agent No " . $_SESSION["id"] ."!</h2>". ".<br>"
	?>	
</div>


    <hr class="mb-3">
		
					<a href="listbus.php" class="btn btn-outline-info" role="button" style="float: center;">List the Buses</a>
					<br>
					<hr class="mb-3">
                    <a href="bookticket.php" class="btn btn-outline-info" role="button" style="float: center;">Book Ticket</a>
                    <br>
                    <hr class="mb-3">
                    <a href="viewbookings.php" class="btn btn-outline-info" role="button" style="float: center;">Show My Bookings</a>
                    <hr class="mb-3">
                    <a href="logout.php" class="btn btn-outline-danger" role="button" style="float: center;">Logout</a>
			
		
	<hr class="mb-3">
</body>
</html>