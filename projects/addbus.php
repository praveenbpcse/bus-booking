<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Bus</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div>
	<a href="index.php" class="btn btn-outline-danger" role="button" style="float: right;">Logout</a>
    <a href="addagent.php" class="btn btn-outline-info" role="button" style="float: right;">Add Agent</a>
    <a href="logout.php" class="btn btn-outline-info" role="button" style="float: right;">Admin Home</a>
    <hr class="mb-3">
	<form action="addbus.php" method="post">
		<div class="container">
            <div class="row">
				<div class="col-sm-3">
					<h1>Add New Bus</h1>
					<p>Fill up the details of Bus.</p>
					
					<hr class="mb-3">
					<label for="bname"><b>Bus Name</b></label>
					<input class="form-control" id="bname" type="text" name="bname" required>

					<label for="fromd"><b>Starting Point</b></label>
					<input class="form-control" id="fromd"  type="text" name="fromd" required>

					<label for="tod"><b>Ending Point</b></label>
					<input class="form-control" id="tod"  type="text" name="tod" required>

					<label for="price"><b>Bus Fare</b></label>
					<input class="form-control" id="price"  type="text" name="price" required>

					<label for="totalseats"><b>Total Seats</b></label>
					<input class="form-control" id="totalseats" type="text" name="totalseats" required>

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


			var bname 	= $('#bname').val();
			var fromd	= $('#fromd').val();
			var tod 		= $('#tod').val();
			var price = $('#price').val();
			var totalseats     = $('#totalseats').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'busprocess.php',
					data: {bname: bname,fromd: fromd,tod: tod,price: price,totalseats: totalseats},
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