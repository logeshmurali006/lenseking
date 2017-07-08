<?php
session_start();
require "dbconn.php";

 class User{
 
   function userData(){
     
     global $con;
     $myarr = array();
    $uname = $_SESSION['name'];
     $sql = "SELECT name,image,designation FROM user WHERE name='$uname'";

     $result = mysqli_query($con,$sql);
     while($row = mysqli_fetch_assoc($result)){
         
         $row_array['name'] = $row['name'];
         $row_array['image'] = $row['image'];
         $row_array['designation'] = $row['designation'];
          
          array_push($myarr,$row_array);
     }
        $myvalues = json_encode($myarr);

     return $myvalues;
   }  
  

  function imageupload($imagetitle,$targetfile,$tempfile)
  {

     global $con;
     
   
        $temp = explode(".", $targetfile);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       if(move_uploaded_file($tempfile,$targetfile.$newfilename)){
         
             $sql = "INSERT INTO gallery (imagetitle,image,status) VALUES('$imagetitle','$targetfile','1')";
             
             $result = mysqli_query($con,$sql);

             if($result){
         
                $output = "ok";
          
               
             }
             else{
               
                $output = "no";        
             }

         }
         else{

          
         $output = "no";        
 
         }

    

       return $output;

  }

 
 }


?>