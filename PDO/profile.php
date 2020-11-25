<?php
include "lib/User.php";
include 'inc/header.php';
Session::checkSession();
?>

<div class="panel panel-default">
<div class="panel-heading">
       <h2> User Profile<span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></h2>
</div>

 <div class="panel-body">
  <div style="max-width:600px; margin: 0 auto ">
   <form action="" method="POST"> 
     
   <div class="form-group">
    <label for="email">Name</label>
    <input type="text" id="name" name="name" class="form-control" value="kamal hasan"/>
      </div>

      <div class="form-group">
    <label for="email">Username</label>
    <input type="text" id="username" name="username" class="form-control" value="kamal123"/>
      </div>

      <div class="form-group">
    <label for="email">Email Addess</label>
    <input type="text" id="email" name="email" class="form-control" value="kamal23@abc.test"/>
      </div>

      <button class="btn btn-success" type="submit" name="register">Update</button>
   </form>
  </div>
 </div>
</div>