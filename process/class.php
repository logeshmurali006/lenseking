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
  

  function imageupload($imagetitle,$targetfile,$tempfile,$folder,$folder2)
  {

     global $con;
       
        $temp = explode(".", $targetfile);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       if(move_uploaded_file($tempfile,$folder.$newfilename)){
            
            $newfilename = $folder2.$newfilename;
             $sql = "INSERT INTO gallery (imagetitle,image,status) VALUES('$imagetitle','$newfilename','1')";
             
             $result = mysqli_query($con,$sql);

             if($result){
         
                $output = "uploaded";
          
               
             }
             else{
               
                $output = "Dberror";        
             }

         }
         else{

          
         $output = "UploadingError";        
 
         }

    

       return $output;

  }



function fetchimages(){
 
  global $con;

   $sql = "SELECT * FROM gallery";

   $result = mysqli_query($con,$sql);
  
   $imgarray = array();

   while($row = mysqli_fetch_array($result)){

     $row_array['id']= $row['id'];
     $row_array['imagetitle']= $row['imagetitle'];
     $row_array['image']= $row['image'];
     $row_array['status']= $row['status'];
    

     array_push($imgarray, $row_array); 
   }
 
  return json_encode($imgarray);

}


function deleteimage($id)
{
global $con;

   $sql = "DELETE FROM gallery WHERE id='$id'";

   $result = mysqli_query($con,$sql);
  
   if($result){
    $output = "Deleted";
   }
   else{
    $output = "NotDeleted";
   }

  return $output;

} 


function imgstatuschange($id,$value){
  
  global $con;

   $sql = "UPDATE gallery SET status='$value' WHERE id='$id'";

   $result = mysqli_query($con,$sql);
  
   if($result){
    $output = "changed";
   }
   else{
    $output = "unchanged";
   }

  return $output;

}


 }



?>