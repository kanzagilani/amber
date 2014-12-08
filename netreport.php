<?php
// connect to the "tests" database
$conn = new mysqli('localhost', 'root', 'amber', 'page1');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

        
// SELECT sql query
$sql = "SELECT id, SUM(income) -SUM(expense) AS netprofit FROM ( SELECT id, SUM(income) AS income, 0 AS expense FROM table1 GROUP BY id UNION ALL".
        "SELECT id, 0, SUM(expense) FROM table2".
         "GROUP BY id ".
       ") AS u".
"GROUP BY id "; 

// perform the query and store the result
$result = $conn->query($sql);

// if the $result contains at least one row
if ($result->num_rows > 0) {
  // output data of each row from $result
  while($row = $result->fetch_assoc()) {
    echo '<br /> Commodity ID '. $row['id']. ' Net Profit '. $row['netprofit'] ;
	echo '<br />';
  }
}
else {
  echo '0 results';
}

$conn->close();
?>