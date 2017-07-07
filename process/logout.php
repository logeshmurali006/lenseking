<?php

include "class.php";

if(isset($_SESSION['name'])){

 $_SESSION['name'] = NULL;	
 header("location:../index.php");
}
else{

 header("location:../index.php");
}

?>