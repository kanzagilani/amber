<?php
// connect to the "tests" database
$conn = new mysqli('localhost', 'root', 'amber', 'page1');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

  $varmonth=$_GET['month'];
  $varday=$_GET['day'];
   $varyear=$_GET['year'];         // sets the name in a variable

// SELECT sql query
$sql = "SELECT * FROM `reg` WHERE `month`='$varmonth' AND `day`='$varday' AND `year`='$varyear'  "; 

// perform the query and store the result
$result = $conn->query($sql);

// if the $result contains at least one row
if ($result->num_rows > 0) {
  // output data of each row from $result
  while($row = $result->fetch_assoc()) {
    echo '<br /> head: '. $row['head']. ' expense: '. $row['expense']. ' month: '. $row['month']. ' day: '. $row['day']. ' year: '. $row['year']. ' id: '. $row['id']. ' longi: '. $row['longi']. ' lati: '. $row['lati']  ;
	echo '<br />';
  }
}
else {
  echo '0 results';
}

$conn->close();
?>