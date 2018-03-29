<?php
/*
 * @author Jaskaran Singh Natt
 */

require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("index.php");
}



if ($status === FALSE) {
die("You dont have the permission to access this page");
}

// set page title
$title = "Contact Us";


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
<title><?php echo PROJECT_NAME ?> - Contact Us</title>

<body> 
 

 <div class="panel panel-default">
  <header class="panel-heading">
   <h2 class="panel-title"><h2>How to Contact Us</h2>
  </header>

  <div class="panel-body">
  <article>
  <h3>Google Maps</h3>
  <div class="mapouter"><div class="gmap_canvas"><iframe style='height: 100%; width: 100%; object-fit: contain' id="gmap_canvas" src="https://maps.google.com/maps?q=University of Greenwich Park Row, London SE10 9LS &t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.mapouter{overflow:hidden;height:800px;width:1075px;}.gmap_canvas {background:none!important;height:800px;width:1075px;}</style></div>
  <h4> Phone number:  <h5 id="p1">020 8331 8000</h5>
  <h4> Email: <h5 id="p2">jn2566u@greenwich.ac.uk </h5>
  <h4> Address: <h5 id="p3"> University of Greenwich<br> </br> Park Row, London SE10 9LS </h5><br>
  <div col-lg-9>
<button class="btn btn-default" onclick="copyToClipboard('#p1')">Copy Number </button>
<button class="btn btn-default" onclick="copyToClipboard('#p2')">Copy Email</button>
<button class="btn btn-default"onclick="copyToClipboard('#p3')">Copy Address</button>
<a href="https://www.google.com/maps/contrib/115620153714965424704/photos/@51.4826689,-0.0056115,3a,75y,243.69h,90t/data=!3m7!1e1!3m5!1sAF1QipMYJWSIr9bVqdOMOgU44kVBQf-UGZzLDfBOhEX6!2e10!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipMYJWSIr9bVqdOMOgU44kVBQf-UGZzLDfBOhEX6%3Dw365-h260-k-no-pi-0-ya48.811512-ro-0-fo100!7i6912!8i3456!4m3!8m2!3m1!1e1"
 class="btn btn-default">Google VR</a>
</div>
</article>
  
   <div class="w3-container">
</div>
  <h4>Additional information</h4><br> 
   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, </p>
  </div>
</div>

<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
</body>

<!--<div class="row">
    <div class="col-lg-9">

        <?php if (authorize($_SESSION["access"]["ABOUT US"]["CONTACT"]["create"])) { ?>
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> ADD CONTACT</button> 
        <?php } ?>
        <div style="height: 10px;">&nbsp;</div>

        <div class=" table-responsive">
            <table class="table table-striped table-hover ">
                <tbody><tr>
                        <th>#</th>
                        <th>Sample heading</th>
                        <th>Sample heading</th>
                        <th style="width: 280px;">Actions</th>
                    </tr>
                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>Sample content</td>
                            <td>Sample content</td>
                            <td>
                                <?php if (authorize($_SESSION["access"]["ABOUT US"]["CONTACT"]["edit"])) { ?>
                                    <button class="btn btn-sm btn-info" type="button"><i class="fa fa-edit"></i> EDIT</button> 
                                <?php } ?>
                                <?php if (authorize($_SESSION["access"]["ABOUT US"]["CONTACT"]["view"])) { ?>
                                    <button class="btn btn-sm btn-warning" type="button"><i class="fa fa-search-plus"></i> VIEW</button>
                                <?php } ?>
                                <?php if (authorize($_SESSION["access"]["ABOUT US"]["CONTACT"]["delete"])) { ?>
                                    <button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i> DELETE</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody></table>
        </div> -->

        <div style="height: 20px;">&nbsp;</div>
        <body><a href="homepage.php"><button class="btn btn-lg btn-info" type="button"><i class="fa fa-backward"></i>Homepage</button></a></body>

    </div>


</div>
<?php include 'footer.php'; ?>