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
  $page = 'youtube'; 
  
  $gallery = new User;
  $gallarray = $gallery->fetchimages();
  
  $galleryarray = json_decode($gallarray,true);

?>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
    <?php
 
 include "master/menu.php";
?> 
 
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-youtube text-purple"></i> Youtube Videos</h1>
            
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Videos</a></li>
              <li>Youtube Videos</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-bottom: 8px;padding-bottom:0px;">
              
               <form id="videoupload"   onsubmit="return videoUpload()"  >
               <div class="row">

                 <div class="col-md-4">
                    <h3 style="margin-top: 8px;">Youtube Video Upload</h3>
                 </div>
                 <div class="col-md-5">
                    <div class="form-group">
                       <input type="text" class="form-control" name="youtubeurl" id="youtubeurl" placeholder="Enter Youtube Video Url">
                    </div>
                 </div>
                 <div class="col-md-2">
                    <div class="form-group">
                       <button class="btn btn-success " type="submit" name="upload" style="padding: 10px 15px "><i class="fa fa-cloud-upload"></i> Upload </button>

                       <button style="opacity: 0" type="reset" id="uploadformreset"></button>
                    </div>
                 </div>
                 
               </div>
               </form>
            </div>
          </div>
        </div>
        
        <div class="card" >
        <div class="card-body">
        
        <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Video</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $counter =1;
                  foreach ($galleryarray as $value) {
                    
                  ?>
                  
                    <tr>
                      <td><?=$counter?></td>
                      
                      <td><img src="<?=$value['image'];?>" style="width:100px;"></td>
                      
                      <td>
                      <form id="img<?=$value['id'];?>" onsubmit="return deleteimage(<?=$value['id']?>)">
                         <input type="hidden" name="imageid" id="imageid" value="<?=$value['id']?>">
                         <button type="submit"  data-toggle="tooltip" title="Delete" class="btn btn-danger mybtn"><i class="fa fa-trash"></i></button>
                      </td>
                      </form>
                    </tr>
                  
                    
                    <?php
                    $counter++;
                    }
                    ?>
                  </tbody>
            </table>
               </div>
            <div>
          </div>
        <div>
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
