<?php
 
// Include config file

require_once "config.php";
 
// Define variables and initialize with empty values
$userid = $password = "";
$userid_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["userid"]))){
        $userid_err = "Please enter username.";
    } else{
        $userid = trim($_POST["userid"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($userid_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, userid, password FROM admin WHERE userid = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_userid);
            
            // Set parameters
            $param_userid = $userid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $userid, $pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$pass){
                            //echo "<a href='adminindex.php'></a>"; 
                             header("Location: adminindex.php");
                             exit;
                              }       
                        else{
                            // Display an error message if password is not valid
                            echo "<div class='alert alert-info'><strong>Warning!</strong> The password you entered was not valid.</div>";
                            
                            }
                    }
                } else{
                    
                    echo "<div class='alert alert-info'><strong>Warning!</strong> No account found with that userid.</div>";

                }
            } else{
                echo "<div class='alert alert-danger'><strong>Warning!</strong> Oops! Something went wrong. Please try again later.</div>";

            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div>
	<a href="exit.php" class="btn btn-outline-danger" role="button" style="float: right;">Exit</a>
    <a href="index.php" class="btn btn-outline-info" role="button" style="float: right;">Home</a>
    <hr class="mb-3">
	<form action="admin.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>Admin Login</h1>
					<hr class="mb-3">
					<label for="userid"><b>User ID</b></label>
					<input class="form-control" id="userid" type="text" name="userid" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Login">
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>