<?php
session_start();

require_once('app/functions.php');

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data

$user_id = $_SESSION['user_id'];
$rescue_id = $_POST['friend_id'];


$sql = "SELECT * FROM rescue_friends WHERE user_id='$user_id' AND rescue_friends='$rescue_id'";

$result= $conn->query($sql);
    if($result){
        while($row = $result->fetch_array()){
            if($rescue_id == $row['rescue_friends']){
              $data['success'] = true;
              $data['message'] = 'Exist in Rescue friends!';
              $data['friend_id'] = $rescue_id;
            }else{
              $data['success'] = false;
              $data['message'] = 'Does not exist!';
            }
        }
    }

echo json_encode($data);