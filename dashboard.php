<?php
/*
 * @author Jaskaran Singh Natt
 */
require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("index.php");
}

// set page title
$title = "Dashboard";
include 'header.php';
?>
<div class="row">
    <div class="col-lg-9">
        <h3>Displaying menu in a group list</h3>
        <div class="well well-sm">
            <ul>
                <?php foreach ($_SESSION["access"] as $key => $access) { ?>
                    <li>
                        <?php echo $access["top_menu_name"]; ?>
                        <?php
                        echo '<ul>';
                        foreach ($access as $k => $val) {
                            if ($k != "top_menu_name") {
                                echo '<li><a href="' . ($val["page_name"]) . '">' . $val["menu_name"] . '</a></li>';
                                ?>
                                <?php
                            }
                        }
                        echo '</ul>';
                        ?>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>

        <div style="height: 10px;">&nbsp;</div>

        <h3>Displaying menu as an individual button</h3>
        <div class="well well-sm">
            <?php foreach ($_SESSION["access"] as $key => $access) { ?>
                <div class="btn-group">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                            <?php echo $access["top_menu_name"]; ?>
                            <span class="caret"></span>
                        </button>
                        <?php
                        echo '<ul class="dropdown-menu">';
                        foreach ($access as $k => $val) {
                            if ($k != "top_menu_name") {
                                echo '<li><a href="' . ($val["page_name"]) . '"><i class="fa fa-forward"></i> ' . $val["menu_name"] . '</a></li>';
                                ?>
                                <?php
                            }
                        }
                        echo '</ul>';
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div style="height: 20px;">&nbsp;</div>
        <a href="logout.php"><button class="btn btn-lg btn-danger" type="button"><i class="fa fa-sign-out"></i>Logout</button></a>

    </div>

    <div class="col-lg-3">
       <?php include 'sidebar.php'; ?>
    </div>
</div>
<?php include 'footer.php'; ?>