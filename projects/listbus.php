<?php
	session_start();
	echo "<h2> Welcome Agent No " . $_SESSION["id"] ."!</h2>". ".<br>"
?>	
<html>
<head>
    <title>List Buses</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>

<body>
  <a href="logout.php" class="btn btn-outline-danger" role="button" style="float: right;">Logout</a>
  <a href="bookticket.php" class="btn btn-outline-info" role="button" style="float: right;">Book Ticket</a>
  <a href="viewbookings.php" class="btn btn-outline-info" role="button" style="float: right;">Show my Bookings</a>
  <a href="agentindex.php" class="btn btn-outline-info" role="button" style="float: right;">Agent Index</a>
  <hr class="mb-3">
<?php 
$db_user = "root";
$db_pass = "";
$db_name = "projectdata"; 
$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name); 

$query = "SELECT * FROM buses";


echo '<table class="table table-striped table-bordered table-hover"> 
      <thead class=" bg-info">
      <tr> 
          <th scope="col">#</th> 
          <th scope="col">Bus ID</th> 
          <th scope="col">Bus Name</th> 
          <th scope="col">From</th> 
          <th scope="col">To</th> 
          <th scope="col">Bus Fare</th> 
          <th scope="col">Total Seats</th>
          <th scope="col">Available Seats</th>
      </tr>
      </thead>
      <tbody>';
$i=0;
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["bname"];
        $field3name = $row["fromd"];
        $field4name = $row["tod"];
        $field5name = $row["price"];
        $field6name = $row["totalseats"];
        $field7name = $row["availseats"]; 
        $i=$i+1;

        echo '<tr> 
                  <th scope="row">'.$i.'</th>
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td>
              </tr>';
    }
    $result->free();
}
echo '</tbody>'; 
?>
</body>
</html>