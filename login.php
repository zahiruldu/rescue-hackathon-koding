<?php
session_start();

require_once('app/functions.php');

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data


$email = $_POST['email'];
$pass = md5($_POST['pass']);

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
 $ip = $_SERVER['SERVER_ADDR'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

      $result= $conn->query($sql);

        if($result){
                while($row = $result->fetch_array()){
     
                        if($email === $row['email']){
                              $data['info'] = $row['email'];
                              $data['success'] = true;
                              $data['message'] = 'Congrats! You have logged in successfully!';

                              // Making the session
                              $_SESSION['user_id'] = $row['id'];
                              $_SESSION['user_ip'] = $ip;

                        }else{
                              $data['message'] = "Your email or Password is incorrect!";  
                              $data['success'] = false;
                              $data['info'] = 'Opps! Try with correct info';
                        }

                        
                
                }
        	

        }else{
        	$data['success'] = false;
	        $data['message'] = 'Already registered! Or there has other issue.';
                $data['info'] = $pass;
        }


echo json_encode($data);