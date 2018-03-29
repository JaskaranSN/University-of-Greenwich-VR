<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon_96x96_tfI_icon.ico" type="image/x-icon" />
        <meta name="author" content="Jaskaran Singh Natt">
        <meta name="keywords" content="VR, University of Greenwich, Demo">



        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet">
        <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="bootstrap/html5shiv.js"></script>
          <script src="bootstrap/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>


        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://www.gre.ac.uk/" target="_blank"><input id="image" type="image" alt="ICON"
  src="favicon_96x96_tfI_icon.ico" width="20" height="20"></span> University of Greenwich</a>
                </div>


                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1" >
                    <ul class="nav navbar-nav">
                        <li><a href="homepage.php">Homepage</a></li>
                        <li><a href="studentlife.php">Student Life</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <?php
                        // if the rights are not set then add them in the current session


                if (!empty($_SESSION["access"]))
				foreach 
						($_SESSION["access"] 
						as 
						
						$key => $access)
if($access !=null) 						{ ?>
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
			<li><a href="logout.php">Logout</a></li>
        </div>
                    </ul>

                </div>
            </div>

        </div>

        <div class="container mainbody">
            <div class="page-header">
                <h1><?php echo $title ?></h1>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="container-fluid">

                <?php if ($ERROR_MSG <> "") { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <p><?php echo $ERROR_MSG; ?></p>
                        </div>
                        <div style="height: 10px;">&nbsp;</div>
                    </div>
                <?php } ?>
