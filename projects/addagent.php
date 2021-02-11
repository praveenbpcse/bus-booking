<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Agent</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div>
	<a href="index.php" class="btn btn-outline-danger" role="button" style="float: right;">Logout</a>
    <a href="addbus.php" class="btn btn-outline-info" role="button" style="float: right;">Add Bus</a>
    <a href="logout.php" class="btn btn-outline-info" role="button" style="float: right;">Admin Home</a>
    <hr class="mb-3">
	<form action="addagent.php" method="post">
		<div class="container">
            <div class="row">
				<div class="col-sm-3">
					<h1>Add Agent</h1>
					<p>Fill up the agent details.</p>
					
					<hr class="mb-3">
					<label for="name"><b>Agent Name</b></label>
					<input class="form-control" id="name" type="text" name="name" required>

					<label for="mobile"><b>Phone Number</b></label>
					<input class="form-control" id="mobile"  type="text" name="mobile" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Submit">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var name 	    = $('#name').val();
			var mobile      = $('#mobile').val();
			var password 	= $('#password').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'agentprocess.php',
					data: {name: name, mobile: mobile, password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
					Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
</body>
</html>