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

  
//$lat1=($_POST['lat1']);
//$lon1=($_POST['lon1']);
//$lat2=($_POST['lat2']);
//$lon2=($_POST['lon2']);
$dis=ceil($_POST['d']);

   $sql = "INSERT INTO distance".
"(dis)".
"VALUES( '$dis')";
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