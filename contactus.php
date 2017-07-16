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
  $page = 'contactus'; 
  
  $contact = new User;
  $contactarray = $contact->fetchContactUs();
  
  $contactdetails = json_decode($contactarray,true);

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
            <h1><i class="fa fa-phone text-purple"></i> Contact Us</h1>
            
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Contact Us</li>
            </ul>
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
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $counter =1;
                  foreach ($contactdetails as $value) {
                    
                  ?>
                  
                    <tr>
                      <td><?=$counter?></td>
                      <td><?=$value['name'];?></td>
                      <td><?=$value['email'];?></td>
                      <td><?=$value['phone'];?></td>                      
                      <td><?=$value['message'];?></td>
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
