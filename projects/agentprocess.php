<?php
require_once('config2.php');
if(isset($_POST)){

	$name 		= $_POST['name'];
	$mobile	    = $_POST['mobile'];
	#$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
	$password	    = $_POST['password'];

$result_check= False;
try{
	$stmt_check = $db->prepare("SELECT id, name, mobile, password FROM agents WHERE mobile =".$mobile);
	$stmt_check->execute();
	$result_check=$stmt_check->fetchAll();
}
catch(PDOException $e) {
  #echo "Error: " . $e->getMessage();
}
	if($result_check){
		echo 'Phone Number already Exists.';
	}
    else{

		$sql = "INSERT INTO agents (name, mobile, password) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name, $mobile, $password]);
		$new = $db->prepare("SELECT * FROM agents WHERE mobile =".$mobile);
        $new->execute();
        $n =$new->fetchAll();
		if($result){
			echo 'Successfully saved.';
			echo 'Your Id is '.$n[0][0];
		}else{
			echo 'There were erros while saving the data.';
		}
	}
}else{
	echo 'No data';
}