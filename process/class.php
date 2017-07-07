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
  

  function imageupload($imagetitle,$targetfile,$extension,$imagesize,$tempfile){

     global $con;
     
     $uploaded = 0 ;

     if($extension == 'png' || $extension == 'jpg' || $extension == 'svg'){
        
       $uploaded = 1 ;        

     }
     else{
       $uploaded = 0 ;
       ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "Please Upload Image only .png , .svg, .jpg",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       </script>
       <?php
       
     } 
    if($imagesize > 500000){
       $uploaded = 1 ;                 
     }
     else{

        $uploaded = 0 ;
        
       ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "Please Upload Image Below 5mb",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       </script>
       <?php
     }

   
   if($uploaded == 1){

      //$temp = explode(".", $targetfile);
      //$newfilename = round(microtime(true)) . '.' . end($temp);
     if(move_uploaded_file($tempfile,$targetfile/*.$newfilename*/)){
       
       $sql = "INSERT INTO gallery (imagetitle,image,status) VALUES('$imagetitle','$targetfile','1')";
       

       $result = mysqli_query($con,$sql);

       if($result){
               ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "  Image Upload Successfully",
          icon: 'fa fa-check-circle' 
            },{
              type: "success"
            });   
       </script>
       <?php

       }
       else{
                ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "Image Cant Be Upload Try Later",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       </script>
       <?php
          
       }

       }
       else{

                 ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "Image Cant Be Upload Try Later",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       </script>
       <?php
        


       }




     }



  }

 
 }


?>