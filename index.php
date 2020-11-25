<?php 
include "lib/User.php";
include "inc/header.php";
Session::checkSession();

?>
<?php
$loginmsg = Session::get("loginmsg");
if (isset($loginmsg)) {
  echo $loginmsg;
}
Session::set("loginmsg",NULL);
?>

<div class="panel panel-default">
       <div class="panel-heading">
       <h2> User List
       <span class="pull-right">
       Welcome!
       <strong>
       <?php 
       $name = Session::get("username");
       if(isset($name)){
         echo $name;
       }
       ?>
</strong>
       </span></h2>
       </div>

      <div class="panel-body"> 
        <table class="table table-striped">
         <tr>
          <th width="20%"> Serial</th>
          <th width="20%"> Name</th>
          <th width="20%"> Username</th>
          <th width="20%"> Email address</th>
          <th width="20%"> Action</th>
         </tr> 

         <?php 
         $user = new User();
         $userdata = $user->getUserData();
         if ($userdata){
           $i=0;
           foreach($userdata as $sdata){ 
             $i++;
        ?>
         <tr>
           <td><?php echo $id; ?></td>
           <td><?php echo $sdata['name']; ?></td>
           <td><?php echo $sdata['username']; ?></td>
           <td><?php echo $sdata['email']; ?>@abc.test</td>
           <td><a class="btn btn-primary" href="Profile.php?id=<?php echo $sdata['id']; ?>">View</a></td>
         </tr>

           <?php 
           }
         } else { 
         ?>
<tr>
<td><h2 colspan = "5"> No user data Found! </h3></td>
</tr>
         <?php  } ?>

           

        </table>

      </div>  
</div>

<?php  
    include "inc/footer.php";
 ?>