<?php
session_start();

require_once('app/functions.php');

require_once('vendor/autoload.php');

$user_id = $_SESSION['user_id'];

$sql="SELECT * FROM users WHERE id !='$user_id'";

// $sql = "SELECT * FROM users
// LEFT JOIN rescue_friends ON users.id = rescue_friends.rescue_friends
// UNION
// SELECT * FROM users
// RIGHT JOIN rescue_friends ON users.id = escue_friends.rescue_friends";

$result= $conn->query($sql);
if($result){
	$data=array();

	while($row = $result->fetch_array()){

		$tin_id = $row['id'];
		$result2 =$conn->query("SELECT * FROM rescue_friends WHERE user_id='$user_id' AND rescue_friends='$tin_id'");

		if(mysqli_num_rows($result2) == 0) {
		     $friens_status = "Not";
		} else {
		    $friens_status = "Ok";
		}



		$data[]= ['friend_id'=>$row['id'], 'firstname'=>$row['first_name'], 'lastname'=>$row['last_name'], 'mobile'=>$row['mobile'], 'lati'=>$row['latitude'],'longi'=>$row['longitude'],'email'=>$row['email'],'status'=>$friens_status ];
		//$data[] =$row['rescue_id'] . " " . $row['latitude'] . " " . $row['longitude'] . " " . $row['mobile'];
	}
echo json_encode(array("data"=>$data));



}