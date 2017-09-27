<!-- Including Database Connections -->

<?php include "dbconnection.php"; ?>

<!-- Redirect Page to Login Page if user is not Logged In -->

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{}
elseif(!empty($_POST['username']) && !empty($_POST['password'])){}
else
{
header("Location: /index.php");
die();
}
?>  


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Philly Scientists</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Philly Scientists</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?=$_SESSION['Username']?> &nbsp; <a href="/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
						
					
                             <!-- Sidebar Menu -->

                    <li>
                        <a href="home.php"><i class="fa fa-home fa-3x"></i> Home</a>
                          
                      <li  >
                        <a  href="groups.php"><i class="fa fa-group fa-3x"></i> Groups </a>
                    </li>
                    
                    
                    <!--  Displaying Programs Tab in the Side Menu if logged in user is Admin -->
                    
 <?php
if(  $_SESSION['Username'] == "admin" )
{

    // Let User Access the Main Page since User is already Logged In

     ?>     <li  >
                        <a  href="programs.php"><i class="fa fa-table fa-3x"></i> Programs </a>
    	</li> 
  <?php
}
 ?>
 
 
                     <li  >
                        <a   href="leaderboards.php"><i class="fa fa-bar-chart-o fa-3x"></i> Leaderboards </a>
                    </li>   

                  <li  >
                        <a  class="active-menu" class="active-menu" href="about.php"><i class="fa fa-desktop fa-3x"></i> About </a>
                    </li>   




                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>About Page</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                       <body>
                       
                       
                       <?php

// Global Variable from index.php page

ob_start();
require('index.php');
$data = ob_get_clean();

echo $isUserLoggedIn;

?>
                       
                       </body>
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
