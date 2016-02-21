<?php
session_start();

require_once('app/functions.php');

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$mobile = $_POST['mobile'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
 $ip = $_SERVER['SERVER_ADDR'];

$sql = "INSERT INTO users (first_name, last_name, email, mobile, latitude, longitude, password, user_ip, created_at)
        VALUES ('$firstname', '$lastname', '$email', '$mobile', '$latitude', '$longitude', '$pass', '$ip',NOW())";

        if($conn->query($sql)===TRUE){
        	$last_id = $conn->insert_id;
        	$data['success'] = true;
	        $data['message'] = 'Thanks! You have registered successfully!';
	        $data['user_id'] = $last_id;

                // Making the session
                $_SESSION['user_id'] = $last_id;
                $_SESSION['user_ip'] = $ip;
        }else{
        	$data['success'] = false;
	        $data['message'] = 'Already registered! Or there has other issue.';
        }


echo json_encode($data);