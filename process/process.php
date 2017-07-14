  
<?php
include 'dbconn.php';
include 'class.php';





/***** gallery Image Upload ******/


if(isset($_FILES["image"]["name"])){
$folder = '../images/gallery/';

$folder2= 'images/gallery/';


$targetfile = $folder2 . basename($_FILES["image"]["name"]);

$extension = pathinfo($targetfile,PATHINFO_EXTENSION);

$imagetitle = $_POST["imagetitle"];

$tempfile = $_FILES["image"]["tmp_name"];


 $imagesize = $_FILES["image"]["size"];

 $uploaded = 1 ;


    $check = getimagesize($tempfile);

if($extension == 'png' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'PNG' || $check == true){
        $uploaded = 1;
     }
     else{
      $uploaded = 0 ;        
       
       echo "extension";
     }

    if($imagesize > 500000){
       $uploaded = 0 ;                 
       
       echo "filesize";
       
     }



     
   if($uploaded == 1)
   {

		$uploadimage= new User;
                                            
		echo $rdata = $uploadimage->imageupload($imagetitle,$targetfile,$tempfile,$folder,$folder2);

 }   
}


/***** gallery Image Upload ******/


if(isset($_POST['imageid'])){
 $id =  $_POST['imageid'];   

 $deleteimage = new User;

  echo $rdata = $deleteimage->deleteimage($id);

}

/***** gallery Image Upload ******/


/***** gallery Image status Upload ******/
 
 if(isset($_POST['status'])){

   $statuschange = new User;
  
   $imgid = $_POST['id'];
   $imgstatus =  $_POST['status'];

   echo $status = $statuschange->imgstatuschange($imgid,$imgstatus);    



 }

/**** gallery Image status Upload ******/

/**** youtube Video Upload ******/
 if(isset($_POST['youtubeurl'])){

   $uploadvideo = new User;
  
   $youtubeurl =  $_POST['youtubeurl'];

   echo $status = $uploadvideo->videoUpload($youtubeurl);    

 }
/**** youtube Video Upload ******/

/**** youtube Video Delete ******/
if(isset($_POST['videodelete'])){

   $deletevideo = new User;
  
   $videoid =  $_POST['videodelete'];

   echo $deletestatus = $deletevideo->videoDelete($videoid);    

 }
/**** youtube Video Delete ******/


?>
