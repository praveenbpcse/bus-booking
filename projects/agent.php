<?php
 session_start();
// Include config file

require_once "config.php";
 
// Define variables and initialize with empty values
$id = $password = "";
$id_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["id"]))){
        $id_err = "Please enter username.";
    } else{
        $id = trim($_POST["id"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($id_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, name, mobile, password FROM agents WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_userid);
            
            // Set parameters
            $param_userid = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $mobile, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        #if(password_verify($password, $hashed_password))
                        if($password == $hashed_password)
                        {
                        	$_SESSION["id"] = $id ;
                            header("Location: agentindex.php");
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
	<title>Agent Login</title>
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
    <form action="agent.php" method="post">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-3">
                    <h1>Agent Login</h1>
                    <hr class="mb-3">
                    <label for="id"><b>Generated ID</b></label>
                    <input class="form-control" id="id" type="text" name="id" required>

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