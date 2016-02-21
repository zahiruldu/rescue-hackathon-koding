<?php
session_start();

//require_once('config.php');
require_once('app/functions.php');

require_once('vendor/autoload.php');

$user_id = $_SESSION['user_id'];

$firstname=$lastname=$email=$mobile='';
if(empty($user_id)){
  header('location:index.php');
}else{
  $sql = "SELECT * FROM users WHERE id='$user_id'";
   $result = $conn->query($sql);
   if($result){
      $data=array();
        while($row = $result->fetch_array()){
            $data[]= ['firstname'=>$row['first_name'], 'lastname'=>$row['last_name'],'email'=>$row['email'], 'mobile'=>$row['mobile'],'latitude'=>$row['latitude'], 'longitude'=>$row['longitude'] ];
      
      }

      echo json_encode($data);


   }
}