<?php
    header('Content-type: text/html');
    header('Access-Control-Allow-Origin: *');
$servername = 'localhost';
$username = 'root';
$password = 'amber';
$dbname='page1';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
echo 'Connected successfully<br />';


$head=($_GET['head']);
$expense=($_GET['expense']);
$month=($_GET['month']);
$day=($_GET['day']);
$year=($_GET['year']);
$id=($_GET['id']);
$lati=($_GET['lati']);
$longi=($_GET['longi']);
  $sql = "INSERT INTO reg".
"(head,expense,month,day,year,id,lati,longi)".
"VALUES( '$head','$expense','$month','$day','$year','$id','$lati','$longi')";
$retval = mysql_query( $sql, $conn );
if ($conn->query($sql) === TRUE) 
{
   echo "New record created successfully";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); // Closing Connection with Server 
?>