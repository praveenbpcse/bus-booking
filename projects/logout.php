<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	session_start();
	// remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
	?>	
</div>


    <hr class="mb-3">
		
					<a href="admin.php" class="btn btn-outline-info" role="button" style="float: center;">Admin Login</a>
					<br>
					<hr class="mb-3">
                    <a href="agent.php" class="btn btn-outline-info" role="button" style="float: center;">Agent Login</a>
                    <br>
                    <hr class="mb-3">
                    <a href="exit.php" class="btn btn-outline-danger" role="button" style="float: center;">Exit</a>
			
		
	<hr class="mb-3">
</body>
</html>