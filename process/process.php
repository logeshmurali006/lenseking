  
<?php
include 'dbconn.php';
include 'class.php';


/***** gallery Image Upload ******/


$folder = '../images/gallery/';

$folder2= 'images/gallery/';


$targetfile = $folder2 . basename($_FILES["image"]["name"]);

$extension = pathinfo($targetfile,PATHINFO_EXTENSION);

$imagetitle = $_POST["imagetitle"];

$tempfile = $_FILES["image"]["tmp_name"];


 $imagesize = $_FILES["image"]["size"];

 $uploaded = 1 ;

    $check = getimagesize($tempfile);
    if($check !== false) {

        $uploaded = 1;
    } else {

        $uploaded = 0;
    }

if($extension == 'png' || $extension == 'jpg' || $extension == 'svg'){
        $uploaded = 1;
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



     
   if($uploaded == 1)
   {

		$uploadimage= new User;
                                            
		echo $rdata = $uploadimage->imageupload($imagetitle,$targetfile,$tempfile,$folder);

 }   



/***** gallery Image Upload ******/





?>
