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
   $sql2 = "SELECT status FROM  gallery  WHERE id='$id'";
   
   $fetchresult = mysqli_query($con,$sql2);    

   if($result){

    if($row = mysqli_fetch_assoc($fetchresult)){

     $output = $row['status'];

    }

   }
   else{
    $output = "error";
   }

  return $output;

}


function videoUpload($url){
  global $con;
  $sql = "INSERT INTO  youtubevideos  (youtubeurl) VALUES ('$url')";
   
  $result = mysqli_query($con,$sql);

  if($result){
    $output = "success";
  }
 else{
   $output =  "dberror";
 }
return $output;
}


function fetchYoutubeVideos(){
  global $con;
  $sql = "SELECT * FROM  youtubevideos";
   
  $result = mysqli_query($con,$sql);

  $videoarray = array();

  while($row = mysqli_fetch_array($result)){
     
     $row_array['id'] = $row['id'];
     $row_array['youtubeurl'] = $row['youtubeurl'];

  array_push($videoarray , $row_array);
  }

 return json_encode($videoarray);

}


function videoDelete($id){
  
  global $con;

  $sql = "DELETE FROM youtubevideos WHERE id='$id'";

  $result = mysqli_query($con,$sql);
  if($result){
    $output = "success";
  }
  else{
    $output = "dberror";
  }
 return $output;
}



 }



?>