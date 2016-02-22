<?php
session_start();

require_once('app/functions.php');

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data

$user_id = $_SESSION['user_id'];
$rescue_id = $_POST['friend_id'];
$relation = $_POST['relation'];


$sql = "INSERT INTO rescue_friends (user_id, rescue_friends, relation,  created_at)
        VALUES ('$user_id', '$rescue_id', '$relation', NOW())";

        if($conn->query($sql)===TRUE){
          $last_id = $conn->insert_id;
          $data['success'] = true;
          $data['message'] = 'Thanks! You have added rescue list successfully!';
          $data['friend_id'] = $rescue_id;

              
        }else{
          $data['success'] = false;
          $data['message'] = 'There has problem to add him/her!';
        }

echo json_encode($data);