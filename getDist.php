<?php
// connect to the "tests" database
$conn = new mysqli('localhost', 'root', 'amber', 'page1');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

        
// SELECT sql query
$sql = "SELECT * FROM `distance` "; 

// perform the query and store the result
$result = $conn->query($sql);

// if the $result contains at least one row
if ($result->num_rows > 0) {
  // output data of each row from $result
  while($row = $result->fetch_assoc()) {
    echo '<br /> distance '. $row['dis'] ;
	echo '<br />';
  }
}
else {
  echo '0 results';
}

$conn->close();
?>