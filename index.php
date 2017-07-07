<?php
require "process/class.php";
if(isset($_SESSION['name'])){
header("location:dashboard.php");
}
else{
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      include "master/head.php";
    ?>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Lens King</h1>
      </div>
      <div class="login-box">
        <form class="login-form" id="loginform" onsubmit="return login()">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="uname" id="uname" type="text" placeholder="Enter Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Enter Password" name="upass" id="upass">
          </div>
          <br>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
      </div>
    </section>
  </body>

  <?php
      include "master/script.php";
    ?>
</html>
<?php



}
?>