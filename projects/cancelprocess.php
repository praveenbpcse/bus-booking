<?php
session_start();
require_once('config2.php');
if(isset($_POST)){

	$busid 		= $_POST['busid'];
	$agentid    = $_SESSION['id'];
	
    $result=False;
    $new = $db->prepare("SELECT * FROM booking WHERE busid =".$busid." and agentid =".$agentid);
    $result=$new->execute();
	if($result==False){
		echo 'Selected Booking Not Available';
	}
    else{
        
		$sql = "SELECT * FROM booking WHERE busid =".$busid." and agentid =".$agentid;
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$n =$stmt->fetchAll();

        $new1 = $db->prepare("SELECT * FROM buses WHERE id =".$busid);
        $new1->execute();
        $m =$new1->fetchAll();

		$avail=$n[0][2]+$m[0][6];
		$s = $db->prepare("UPDATE buses SET availseats= ".$avail." WHERE id = ".$busid);
		$s->execute();
        
        $r=False;
        $new = $db->prepare("DELETE FROM booking WHERE busid =".$busid." and agentid =".$agentid);
        $r=$new->execute();

		if($r){
			echo 'Successfully Canceled.';
		}else{
			echo 'There were erros while saving the data.';   
		}
	}
}
	?>