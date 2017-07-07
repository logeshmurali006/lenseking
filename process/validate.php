<?php
//lensking123
require "class.php";
require "dbconn.php";

$uname = $_POST['uname'];
$upass = $_POST['upass'];

if($uname !="" && $upass !=""){


  $sql = "SELECT name,password FROM  user";

  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_assoc($result)){

  	$name = $row['name'];
    $password = $row['password'];
  }

  if($name == $uname && $password == $upass){

  	echo "ok";
  	$_SESSION['name'] = $name;
  }
  else{
  	echo "no";
  }
   

}




?>