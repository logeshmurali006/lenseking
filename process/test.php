               <form  action='test.php' method="POST"  enctype="multipart/form-data" >
               <div class="row">

                 <div class="col-md-5">
                    <div class="form-group">
                       <input type="text" name="imagetitle" id="imagetitle" class="form-control" placeholder="Enter Image Title">
                    </div>
                 </div>
                 <div class="col-md-5">
                    <div class="form-group">
                       <input type="file" class="form-control" name="image" id="image" style="padding: 7.5px 8px ">
                    </div>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <button class="btn btn-success" type="submit" name="upload" style="padding: 10px 15px "><i class="fa fa-cloud-upload"></i> Upload </button>
                    </div>
                 </div>
                 
               </div>
               </form>



<?php

include 'dbconn.php';
if(isset($_POST['upload'])){
$folder = 'images/gallery';

$targetfile =  $folder.basename($_FILES['image']['name']);

$extension = pathinfo($targetfile,PATHINFO_EXTENSION);

$imagetitle = $_POST['imagetitle'];

$tempfile = $_FILES['image']['tmp_name'];

$imagesize = $_FILES['image']['size'];

     $uploaded = 0 ;

     if($extension == 'png' || $extension == 'jpg' || $extension == 'svg'){
        
       $uploaded = 1 ;        

     }
     else{
       $uploaded = 0 ;


echo "not uploaded png";
       
     } 

   
   if($uploaded == 1){

      $temp = explode(".", $targetfile);
      $newfilename = round(microtime(true)) . '.' . end($temp);
     if(move_uploaded_file($tempfile,$targetfile.$newfilename)){
       
       $sql = "INSERT INTO gallery (imagetitle,image,status) VALUES('$imagetitle','$targetfile','1')";
       

       $result = mysqli_query($con,$sql);

       if($result){
            
echo " uploaded ";
       
       }
       else{
          
echo "not uploaded db";
       
       }

       }
       else{

        


       }
}
}
       ?>