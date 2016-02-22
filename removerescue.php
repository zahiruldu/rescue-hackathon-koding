<?php
session_start();

require_once('app/functions.php');

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data

$user_id = $_SESSION['user_id'];
$rescue_id = $_POST['friend_id'];


$sql = "DELETE FROM rescue_friends WHERE user_id='$user_id' AND rescue_friends='$rescue_id'";

$result= $conn->query($sql);
    if($result){
              $data['success'] = true;
              $data['message'] = 'Removed successfully!';
              $data['friend_id'] = $rescue_id;

        
    }else{
      $data['success'] = false;
      $data['message'] = 'Problem to delete';
    }

echo json_encode($data);