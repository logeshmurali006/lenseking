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
            <h1><i class="fa fa-image text-purple"></i> Gallery</h1>
            
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
            <div class="card" style="margin-bottom: 8px">
              <h3 class="card-title">Image Upload</h3>
               <form id="imageupload"   onsubmit="return imageupload()"  enctype="multipart/form-data" >
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
                      <th>Title</th>
                      <th>Image</th>
                      <th>Status</th>
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
                      <td><?=$value['imagetitle'];?></td>
                      <td><img src="<?=$value['image'];?>" style="width:100px;"></td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="imgstatus<?=$value['id'];?>" id="imgstatus<?=$value['id'];?>" <?=($value['status'] == 1)?'checked':'';?>><span class="flip-indecator" data-toggle-on="Click to Ban" data-toggle-off="Click to active" style="width:105px;"></span>
                          </label>
                        </div>
                      </td>
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
