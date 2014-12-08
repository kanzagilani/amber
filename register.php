<?php
//ini_set("display_errors",1);
require_once 'excel_reader2.php';
require_once 'db.php';

$data = new Spreadsheet_Excel_Reader("register.xls");


$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i][cells])>0) // checking sheet not empty
	{
		//echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i][cells])."<br />";
		for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i][cells][$j][$k];
				$html.="</td>";
			}
			$data->sheets[$i][cells][$j][1];
			$head = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][1]);
			$expense = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][2]);
			$month = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][3]);
			$day = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][4]);
			$year = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][5]);
			$id = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][6]);
			$longi = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][7]);
			$lati = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][8]);
			
			$query = "insert into reg(head,expense,month,day,year,id,longi,lati) values('".$head."','".$expense."','".$month."','".$day."','".$year."','".$id."','".$longi."','".$lati."')";
			
			mysqli_query($connection,$query);
			$html.="</tr>";
		}
	}
	
}

//$html.="</table>";
//echo $html;
echo "<br />Data Inserted in dababase";
 //header('Location: http://localhost/registration-form-validatio.html');
?>