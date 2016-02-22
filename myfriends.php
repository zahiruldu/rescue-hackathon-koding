<?php
session_start();

require_once('app/functions.php');

require_once('vendor/autoload.php');

$user_id = $_SESSION['user_id'];

// $sql="SELECT * FROM users WHERE id !='$user_id'";

$sql = "SELECT * FROM rescue_friends 
   INNER JOIN users
     ON users.id = rescue_friends.rescue_friends
 WHERE rescue_friends.user_id = '$user_id' ";

$result= $conn->query($sql);
if($result){
	$data=array();

	while($row = $result->fetch_array()){

		$data[]= ['friend_id'=>$row['id'], 'firstname'=>$row['first_name'], 'lastname'=>$row['last_name'], 'mobile'=>$row['mobile'], 'lati'=>$row['latitude'],'longi'=>$row['longitude'],'email'=>$row['email'] ];
		//$data[] =$row['rescue_id'] . " " . $row['latitude'] . " " . $row['longitude'] . " " . $row['mobile'];
	}
echo json_encode(array("data"=>$data));



}