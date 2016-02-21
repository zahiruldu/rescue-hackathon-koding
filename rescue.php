<?php

require_once('app/functions.php');

require_once('vendor/autoload.php');


$sql="SELECT rescue_id, type, status, longitude, latitude,mobile
FROM rescue
INNER JOIN users
ON rescue.rescue_id=users.id;";

$result= $conn->query($sql);
if($result){
	$data=array();

	while($row = $result->fetch_array()){

		$data[]= ['id'=>$row['rescue_id'], 'lati'=>$row['latitude'],'longi'=>$row['longitude'] ];
		//$data[] =$row['rescue_id'] . " " . $row['latitude'] . " " . $row['longitude'] . " " . $row['mobile'];
	}
echo json_encode(array("data"=>$data));



}