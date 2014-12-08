<?php
$servername = "localhost";
$username = "root";
$password = "amber";
$dbname = "page1";
$conn = mysqli_connect($servername,$username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
} 


$sql = "SELECT *FROM reg";
$res = $conn->query($sql);
if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo "lati: " . $row["lati"]. " - longi: " . $row["longi"]. " <br>";

    }
} else {
    echo "0 results";
}

$row="SELECT LAST(lati,longi) *FROM reg";
$geo = 'http://maps.google.com/maps/api/geocode/xml?latlng='.htmlentities(htmlspecialchars(strip_tags($row))).'&sensor=true';
$xml = simplexml_load_file($geo);

foreach($xml->result->address_component as $component){
	if($component->type=='street_address'){
		$geodata['Precise Address'] = $component->long_name;
	}
	if($component->type=='natural_feature'){
		$geodata['Natural Feature'] = $component->long_name;
	}
	if($component->type=='airport'){
		$geodata['Airport'] = $component->long_name;
	}
	if($component->type=='park'){
		$geodata['Park'] = $component->long_name;
	}
	if($component->type=='premise'){
		$geodata['Named Location'] = $component->long_name;
	}
	if($component->type=='street_number'){
		$geodata['House Number'] = $component->long_name;
	}
	if($component->type=='route'){
		$geodata['Street'] = $component->long_name;
	}
	if($component->type=='locality'){
		$geodata['City'] = $component->long_name;
	}
	if($component->type=='administrative_area_level_3'){
		$geodata['District Region'] = $component->long_name;
	}
	if($component->type=='neighborhood'){
		$geodata['Sector'] = $component->long_name;
	}
	if($component->type=='colloquial_area'){
		$geodata['Locally Known As'] = $component->long_name;
	}
	if($component->type=='administrative_area_level_2'){
		$geodata['State'] = $component->long_name;
	}
	if($component->type=='postal_code'){
		$geodata['Postcode'] = $component->long_name;
	}
	if($component->type=='country'){
		$geodata['Country'] = $component->long_name;
	}
}

list($lat,$long) = explode(',',htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))));
$geodata['Complete Location'] = $xml->result->formatted_address;
$geodata['speed'] = htmlentities(htmlspecialchars(strip_tags($_GET['speed'])));
echo '<img src="http://maps.google.com/maps/api/staticmap?center='.$lat.','.$long.'&zoom=14&size=150x150&maptype=roadmap&&sensor=true" width="250" height="230" " \/><br /><br />';
foreach($geodata as $name => $value){
	echo '<b>'.$name.': '.str_replace('&','&amp;',$value).'</b><br />';
}


mysqli_close($conn);
?>