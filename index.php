<?php
/*
 * @author Jaskaran Singh Natt
 */
require_once("config.php");

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
    // if logged in send to homepage page
    redirect("homepage.php");

}

$title = "Login";

if ($_POST["username"]) {

    $username = trim($_POST['username']);
    $pass = trim($_POST['user_password']);


    if ($username == "" || $pass == "") {

        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Enter manadatory fields";
    } else {
        $sql = "SELECT * FROM system_users WHERE u_username = :uname AND u_password = :upass ";

        try {
            $stmt = $DB->prepare($sql);

            // This binds the values
            $stmt->bindValue(":uname", $username);
            $stmt->bindValue(":upass", $pass);

            // This executes Query
            $stmt->execute();
            $results = $stmt->fetchAll();
			// This and log in messages 
            if (count($results) > 0) {
                $_SESSION["errorType"] = "success";
                $_SESSION["errorMsg"] = "You have successfully logged in.";

                $_SESSION["user_id"] = $results[0]["u_userid"];
                $_SESSION["rolecode"] = $results[0]["u_rolecode"];
                $_SESSION["username"] = $results[0]["u_username"];
                $sql = "SELECT mod_modulegroupcode, mod_modulegroupname FROM module "
                    . " WHERE 1 GROUP BY `mod_modulegroupcode` "
                    . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";


                $stmt = $DB->prepare($sql);
                $stmt->execute();
                $commonModules = $stmt->fetchAll();

                $sql = "SELECT mod_modulegroupcode, mod_modulegroupname, mod_modulepagename,  mod_modulecode, mod_modulename FROM module "
                    . " WHERE 1 "
                    . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";

                $stmt = $DB->prepare($sql);
                $stmt->execute();
                $allModules = $stmt->fetchAll();

                $sql = "SELECT rr_modulecode, rr_create,  rr_edit, rr_delete, rr_view FROM role_rights "
                    . " WHERE  rr_rolecode = :rc "
                    . " ORDER BY `rr_modulecode` ASC  ";

                $stmt = $DB->prepare($sql);
                $stmt->bindValue(":rc", $_SESSION["rolecode"]);


                $stmt->execute();
                $userRights = $stmt->fetchAll();

                $_SESSION["access"] = set_rights($allModules, $userRights, $commonModules);

                redirect("homepage.php");
                exit;
            } else {
                $_SESSION["errorType"] = "info";
                $_SESSION["errorMsg"] = "username or password does not exist.";
            }
        } catch (Exception $ex) {

            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = $ex->getMessage();
        }

    }
    //redirect("index.php");
}

include 'header.php';
?>
<div class="row">
    <div class="col-lg-9">
        <form class="form-horizontal" name="contact_form" id="contact_form" method="post" action="">
            <input type="hidden" name="mode" value="login" >

            <fieldset>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="username"><span class="required">*</span>Username:</label>
                    <div class="col-lg-6">
                        <input type="text" value="" placeholder="User Name" id="username" class="form-control" name="username" required="" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label" for="user_password"><span class="required">*</span>Password:</label>
                    <div class="col-lg-6">
                        <input type="password" value="" placeholder="Password" id="user_password" class="form-control" name="user_password" required="" >
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
                        <button class="btn btn-primary" type="submit">Submit</button> 
                    </div>
                </div>
                
                <div style="height: 10px;">&nbsp;</div>
                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
                       <div class="help-block">
                    <strong>Role == Username/ Password</strong><br>
                    Admin == Jaskaran/ JSN<br>
                    Internal User == i_user/ i_user<br>
					External User == e_user/ e_user<br>
					Guest == Guest/ 1<br>
                </div>
                    </div>
                </div>
                
                
                
				
            </fieldset>
        </form>
    </div>

    <div class="col-lg-3">
        <?php include 'sidebar.php'; ?>
    </div>
</div>
<?php include 'footer.php'; ?>