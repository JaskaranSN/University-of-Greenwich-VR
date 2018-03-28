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
<title><?php echo PROJECT_NAME ?> - Admin</title>
<div class="row">
    <div class="col-lg-9">

<?php

$name = $u_username

?>

        <?php if (authorize($_SESSION["access"]["ADMIN PANEL"]["ADMIN"]["create"])) { ?>
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> ADD ADMIN</button> 
        <?php } ?>
        <div style="height: 10px;">&nbsp;</div>

        

        <div style="height: 20px;">&nbsp;</div>
        <a href="dashboard.php"><button class="btn btn-lg btn-info" type="button"><i class="fa fa-backward"></i> Back to dashboard</button></a>

    </div>

    <div class="col-lg-3">
        <?php include 'sidebar.php'; ?>
    </div>
</div>
<?php include 'footer.php'; ?>