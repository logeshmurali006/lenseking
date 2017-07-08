<?php

require "process/class.php";
if(isset($_SESSION['name']))
{
?>
<!DOCTYPE html>

<html>
  <head>
<?php
 
 include "master/head.php";
  $page = 'gallery'; 

?>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
    <?php
 
 include "master/menu.php";



//if(isset($_POST['upload'])){


//}
/*else{
  ?>
       <script type="text/javascript">
            $.notify({
          title: "Image Upload : ",
          message: "Error while submit",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       </script>
       <?php
       
}

 */
?> 
 
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-image"></i> Gallery</h1>
            
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Gallery</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Image Upload</h3>
               <form id="imageupload"    onsubmit="return imageupload()" enctype="multipart/form-data" >
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
 include "master/script.php";
?>
  </body>
</html>
<?php
}
else
{
  header("location:index.php");
}
?>
