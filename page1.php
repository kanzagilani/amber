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


  $varname=$_GET['name'];
  $varincome=$_GET['income'];
     
  
   $sql = "INSERT INTO info".
"(c_name,income)".
"VALUES( '$varname','$varincome')";
$retval = mysql_query( $sql, $conn );
if ($conn->query($sql) === TRUE) 
{
  
   
   echo "New record entered ";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); // Closing Connection with Server
?>
