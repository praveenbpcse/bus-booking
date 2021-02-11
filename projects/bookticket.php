<?php
require_once('config.php');
session_start();
echo "<h2> Welcome Agent No " . $_SESSION["id"] ."!</h2>". ".<br>"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
		
</div>

<div>
	<a href="logout.php" class="btn btn-outline-danger" role="button" style="float: right;">Logout</a>
    <a href="listbus.php" class="btn btn-outline-info" role="button" style="float: right;">List Buses</a>
    <a href="viewbookings.php" class="btn btn-outline-info" role="button" style="float: right;">Show my Bookings</a>
    <a href="agentindex.php" class="btn btn-outline-info" role="button" style="float: right;">Agent Index</a>
    <hr class="mb-3">
	<form action="bookticket.php" method="post">
		<div class="container">
            <div class="row">
				<div class="col-sm-3">
					<h1>Book Ticket</h1>
					<p>Fill up the booking details.</p>
					
					<hr class="mb-3">
					<label for="busid"><b>Bus ID</b></label>
					<input class="form-control" id="busid" type="text" name="busid" required>

					<label for="seats"><b>No of seats</b></label>
					<input class="form-control" id="seats"  type="text" name="seats" required>
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


			var busid 	= $('#busid').val();
			var seats	= $('#seats').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'bookticketprocess.php',
					data: {busid: busid, seats: seats},
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
								'text': 'There were Errors.',
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