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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <a  href="home.php"><i class="fa fa-home fa-3x"></i> Home</a>

					 <li  >
                        <a class="active-menu"  href="groups.php"><i class="fa fa-group fa-3x"></i> Groups </a>
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
                        <a  href="about.php"><i class="fa fa-desktop fa-3x"></i> About </a>
                    </li>   


                

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     
                    
<?php

// Checking fields and saving data to Database

if(!empty($_POST['groupname']) && !empty($_POST['teacherid']) && !empty($_POST['programid']))
{

    $groupname =  mysqli_real_escape_string($dbconnection, $_POST['groupname']);
    $teacherid = mysqli_real_escape_string($dbconnection, $_POST['teacherid']);
    $programid = mysqli_real_escape_string($dbconnection, $_POST['programid']);
    $uniquecodegenerator = substr(md5(uniqid(rand(), true)),0,7);
    $uniquecode = mysqli_real_escape_string($dbconnection, $uniquecodegenerator);
    $description = mysqli_real_escape_string($dbconnection, $_POST['description']);

   	$creategroupquery = mysqli_query($dbconnection, "INSERT INTO Groups (GroupName, TeacherID, ProgramID, UniqueCode, Description) VALUES('".$groupname."', '".$teacherid."', '".$programid."', '".$uniquecode."', '".$description."')");

        if($creategroupquery)
        {
            echo "<h2>Success</h2>";
            echo "<h5>Your group was successfully created.</h5>";
        }
        else
        {
            echo "<h2>Error</h2>";
            echo "<h5>Sorry, your group creation attempt failed. Please try again.</h5>";    
        }  


}      

else if (!empty($_POST['groupname']) || !empty($_POST['teacherid']) || !empty($_POST['programid'])) {

            echo "<h2>Error</h2>";
            echo "<h5>Sorry, all the required fields are not completed for Group creation. Please try again.</h5>"; 
}     
                    
    ?>        
    
                     <h2>Create Student Group</h2>   
                                               <hr/>
     
        
    <form role="form" method="post" action="groupcreate.php" name="creategroup" id="creategroup">
    <fieldset>
        <label for="groupname">Group Name:</label>&thinsp;&thinsp;   <input  class="form-control" type="text" name="groupname" id="groupname" /><br />
        <label for="teacherid">Teacher ID:</label>&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;<input  class="form-control" type="text" name="teacherid" id="teacherid" /><br />
        
        
          <div class="form-group">
                                                <label name="programid" id="programid" for="enabledSelect">Program ID:</label>
                                                <select id="enabledSelect" class="form-control" name="programid" id="programid" >


	<!-- Program IDs are obtained from the Database and displayed as choices in a Dropdown for the user to choose from-->
	
	    <?php 
                                    
                                    
    $obtainprogramcontentsquery = mysqli_query($dbconnection, "SELECT * FROM Programs");
	

if ( $obtainprogramcontentsquery)
{

while($rowcontents = mysqli_fetch_array($obtainprogramcontentsquery))
        			echo "<option>".$rowcontents['ProgramUniqueID']."</option>";                                    
} 

?>
	



                                                </select>
        </div>
        
  <!-- <label for="uniquecode">Unique Code for the Group:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="uniquecode" id="uniquecode" /><br /> -->
        <label for="description">Description:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="description" id="description" /><br />


        <input class="btn btn-primary" type="submit" name="creategroup" id="creategroup" value="Create Group"/>
<br>
    </fieldset>
    </form>
    
                       
          
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
