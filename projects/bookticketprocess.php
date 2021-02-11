<?php
session_start();
require_once('config2.php');
if(isset($_POST)){

	$busid 		= $_POST['busid'];
	$seats		= $_POST['seats'];
	$agentid    = $_SESSION['id'];
	

    $new = $db->prepare("SELECT * FROM buses WHERE id =".$busid);
    $new->execute();
    $n =$new->fetchAll();
	if($n[0][6]<$seats){
		echo 'Selected seats not available';
	}
    else{
        
		$sql = "INSERT INTO booking (busid, agentid, seats, price) VALUES(?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$price=$seats*$n[0][4];
		$result = $stmtinsert->execute([$busid, $agentid, $seats, $price]);
		if($result){
			$avail=$n[0][6]-$seats;
			$s = "UPDATE buses SET availseats= ".$avail." WHERE id = ".$busid;
			$up = $db->prepare($s);
			$up->execute();
			echo 'Successfully Booked.';
		}else{
			echo 'There were erros while saving the data.';
		}
	}
}else{
	echo 'No data';
}