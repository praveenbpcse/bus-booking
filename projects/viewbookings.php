<?php
	session_start();
	echo "<h2> Welcome Agent No " . $_SESSION["id"] ."!</h2>". ".<br>"
?>	
<html>
<head>
    <title>Your Bookings</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>

<body>
  <a href="logout.php" class="btn btn-outline-danger" role="button" style="float: right;">Logout</a>
  <a href="bookticket.php" class="btn btn-outline-info" role="button" style="float: right;">Book Ticket</a>
  <a href="listbus.php" class="btn btn-outline-info" role="button" style="float: right;">List Buses</a>
  <a href="agentindex.php" class="btn btn-outline-info" role="button" style="float: right;">Agent Index</a>
  <a href="cancel.php" class="btn btn-outline-info" role="button" style="float: right;">Cancel booking</a>
  <hr class="mb-3">
<?php 
$db_user = "root";
$db_pass = "";
$db_name = "projectdata"; 
$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name); 

$query = "SELECT * FROM booking WHERE agentid = ".$_SESSION["id"];


echo '<table class="table table-striped table-bordered table-hover"> 
      <thead class=" bg-info">
      <tr> 
          <th scope="col">#</th> 
          <th scope="col">Bus ID</th> 
          <th scope="col">Seats</th> 
          <th scope="col">Price</th> 

      </tr>
      </thead>
      <tbody>';
$i=0;
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["busid"];
        $field2name = $row["seats"];
        $field3name = $row["price"];
        $i=$i+1;

        echo '<tr> 
                  <th scope="row">'.$i.'</th>
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
    $result->free();
}
echo '</tbody>'; 
?>
</body>
</html>