<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
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
if ( authorize($_SESSION["access"]["VIRTUAL"]["PUBLIC"]["create"]) || 
authorize($_SESSION["access"]["VIRTUAL"]["PUBLIC"]["edit"]) || 
authorize($_SESSION["access"]["VIRTUAL"]["PUBLIC"]["view"]) || 
authorize($_SESSION["access"]["VIRTUAL"]["PUBLIC"]["delete"]) ) {
 $status = TRUE;
}

if ($status === FALSE) {
die("You dont have the permission to access this page");
}

// set page title
$title = "<h2>University of Greenwich Public VR Tours</h2>";


include 'header.php';
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 45px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<style>
body{
  font-family: Arial, Helvetica, sans-serif;
  font-size:17px;
  line-height:1.6;
}

.button{
  background:coral;
  padding:1em 2em;
  color:#fff;
  border:0;
}

.button:hover{
  background:#333;
}

.modal{
  display:none;
  position: fixed;
  z-index:1;
  left: 0;
  top:0;
  height: 100%;
  width:100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.5);
}

.modal-content{
  background-color:#f4f4f4;
  margin: 20% auto;
  width:70%;
  box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
  animation-name:modalopen;
  animation-duration:1s;
}

.modal-header h2, .modal-footer h3{
  margin:0;
}

.modal-header{
  background:coral;
  padding:15px;
  color:#fff;
}

.modal-body{
  padding:10px 20px;
}

.modal-footer{
  background:coral;
  padding:10px;
  color:#fff;
  text-align: center;
}

.closeBtn{
  color:#ccc;
  float: right;
  font-size:30px;
  color:#fff;
}

.closeBtn:hover,.closeBtn:focus{
  color:#000;
  text-decoration: none;
  cursor:pointer;
}

@keyframes modalopen{
  from{ opacity: 0}
  to {opacity: 1}
}
</style>
</head>
<body>

<h3>University Map</h3>

<img id="myImg" src="MAP1.PNG" alt="" width="1100" height="800">

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
        <div id="page-wrapper">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Locations
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									<?php if (authorize($_SESSION["access"]["VIRTUAL"]["PUBLIC"]["view"])) { ?>
                                        <th>Icon</th>
                                        <th>Location name</th>
                                        <th>Virtual Reality Tour</th>
                                        <th>Slideshow</th>
                                        <th>Public</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td><input id="image" type="image" alt="Chapel"
  src="icons/Chapel.PNG" width="40" height="40"></td>
                                        <td>Chapel</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        <td class="center">4</td>
                                        <td class="center">X</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td><input id="image" type="image" alt="King Charles"
  src="icons/King_Charles.PNG" width="40" height="40"></td>
                                        <td>King Charles</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td><input id="image" type="image" alt="King Williams"
  src="icons/King_William.PNG" width="40" height="40"></td>
                                        <td>King Williams</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        <td class="center">5.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td><input id="image" type="image" alt="Painted Halls"
  src="icons/Painted_Halls.PNG" width="40" height="40"></td>
                                        <td>Painted Halls</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td><input id="image" type="image" alt="Queen Anne"
  src="icons/Queen_Anne.PNG" width="40" height="40"></td>
                                        <td>Queen Anne</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        <td class="center">7</td>
                                        <td class="center">A</td>
										
                                    </tr>
									<tr class="odd gradeA">
                                        <td><input id="image" type="image" alt="Queen Mary"
  src="icons/Queen_Mary.PNG" width="40" height="40"></td>
                                        <td>Queen Mary</td>
                                        <td><button class="btn btn-sm btn-info" type="button" onclick="location.href='https://players.cupix.com/p/sT7qV5Es';"><i class="fa fa-edit"></i> VR TOUR</button></td>
                                        
                                        <td> <button class="btn btn-sm btn-warning" button id="modalBtn" class="button" >SLIDESHOW</button>

  <div id="simpleModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
          <span class="closeBtn">&times;</span>
          <h2>Modal Header</h2>
      </div>
      <div class="modal-body">
        <p>Hello...I am a modal</p>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="1.PNG" alt="Los Angeles"width="pixels">
    </div>

    <div class="item">
      <img src="MAP.PNG" alt="Chicago" width="pixels">
    </div>

    <div class="item">
      <img src="MAP.PNG" alt="New York" width="pixels">
	  
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
 
</div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla repellendus nisi, sunt consectetur ipsa velit repudiandae aperiam modi quisquam nihil nam asperiores doloremque mollitia dolor deleniti quibusdam nemo commodi ab.</p>
      </div>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>
  </div></td>
  <td class="center">7</td>
										
                                    </tr>
<?php } ?>

                                </tbody>
                            </table>

				<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>	
<script>
// Get modal element
var modal = document.getElementById('simpleModal');
// Get open modal button
var modalBtn = document.getElementById('modalBtn');
// Get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];

// Listen for open click
modalBtn.addEventListener('click', openModal);
// Listen for close click
closeBtn.addEventListener('click', closeModal);
// Listen for outside click
window.addEventListener('click', outsideClick);

// Function to open modal
function openModal(){
  modal.style.display = 'block';
}

// Function to close modal
function closeModal(){
  modal.style.display = 'none';
}

// Function to close modal if outside click
function outsideClick(e){
  if(e.target == modal){
    modal.style.display = 'none';
  }
}	
</script>       


        <div style="height: 20px;">&nbsp;</div>
        <a href="dashboard.php"><button class="btn btn-lg btn-info" type="button"><i class="fa fa-backward"></i> Back to dashboard</button></a>

    </div>

    
</div>
</HTML>
<?php include 'footer.php'; ?>