<?php
require_once('config2.php');
if(isset($_POST)){

	$bname		    = $_POST['bname'];
	$fromd 		    = $_POST['fromd'];
	$tod 			= $_POST['tod'];
	$price	        = $_POST['price'];
	$totalseats     = $_POST['totalseats'];

$result_check= False;
try{
	$stmt_check = $db->prepare("SELECT id, bname, fromd, tod, price, totalseats, availseats FROM buses WHERE bname =".$bname);
	$stmt_check->execute();
	$result_check=$stmt_check->fetchAll();
}
catch(PDOException $e) {
  #echo "Error: " . $e->getMessage();
}
	if($result_check){
		echo 'User ID already Exists.';
	}
    else{

		$sql = "INSERT INTO buses (bname, fromd, tod, price, totalseats, availseats) VALUES(?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$bname, $fromd, $tod, $price, $totalseats, $totalseats]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
	}
}else{
	echo 'No data';
}