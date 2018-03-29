<?php
/*
 * @author Jaskaran Singh Natt
 */

require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("index.php");
}
$status = FALSE;
if ( authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["create"]) || 
authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["edit"]) || 
authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["view"]) || 
authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["delete"]) ) {
 $status = TRUE;
// access only available if admin 
}

if ($status === FALSE) {
die("You dont have the permission to access this page");
}

// set page title
$title = "Admin";


include 'header.php';
?>
<style>
body {
              background-color:#999999;
              font-family: 'Oswald', sans-serif;
      }
p
{
  color:#000000;
  font-size:20px;
}

.textBox
{
  height:30px;
  width:300px;
}

button
{
  height:30px;
  width:150px;
  border-radius:8px;
  padding:10px;
  font-size:20px;
  font-family: 'Oswald', sans-serif;
  height:52px;
  cursor:pointer;
  background-color:wheat;
}
</style>
<title><?php echo PROJECT_NAME ?> - Admin</title>
<div class="row">
    <div class="col-lg-9">

<?php

$name = $u_username

?>
<title><?php echo PROJECT_NAME ?> - Homepage</title>
<body> 
 

 <div class="panel panel-default">
  <header class="panel-heading">
   <h5 class="panel-title">Admin Panel</h5>
  </header>
          <?php if (authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["create"])) { ?>
            <button class="btn btn-sm btn-primary" input type="button" onclick="location.href='http://localhost/phpmyadmin/';"><i class="fa fa-plus"></i> Manage Database</button>
        <?php } ?>
        <div style="height: 10px;">&nbsp;</div>
  <div class="panel-body">
   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, </p>
  </div>
</div>

</body>


        

        <div style="height: 20px;">&nbsp;</div>
        <a href="homepage.php"><button class="btn btn-lg btn-info" type="button"><i class="fa fa-backward"></i> Homepage</button></a>

    </div>

</div>
<?php include 'footer.php'; ?>