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
                        <a  href="groups.php"><i class="fa fa-group fa-3x"></i> Groups </a>
                    </li>
                    
                    <!--  Displaying Programs Tab in the Side Menu if logged in user is Admin -->
                    
 <?php
if(  $_SESSION['Username'] == "admin" )
{

    // Let User Access the Main Page since User is already Logged In

     ?>     <li  >
                        <a class="active-menu"  href="programs.php"><i class="fa fa-table fa-3x"></i> Programs </a>
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


// Creating Program in the Database IF ALL REQUIRED FIELDS are filled

if(!empty($_POST['programname']) && !empty($_POST['description']) && !empty($_POST['programid']))
{

    $programname =  mysqli_real_escape_string($dbconnection, $_POST['programname']);
    $programid = mysqli_real_escape_string($dbconnection, $_POST['programid']);
    $description = mysqli_real_escape_string($dbconnection, $_POST['description']);

   	$createprogramquery = mysqli_query($dbconnection, "INSERT INTO Programs (ProgramName, ProgramUniqueID, Description) VALUES('".$programname."', '".$programid."', '".$description."')");


        if($createprogramquery)
        {
            echo "<h2>Success</h2>";
            echo "<h5>Your program was successfully created.</h5>";
        }
        else
        {
            echo "<h2>Error</h2>";
            echo "<h5>Sorry, your program creation attempt failed. Please try again.</h5>";    
        }  


}

// IF ALL REQUIRED FIELDS are NOT filled, displaying an error prompt
 
else if (!empty($_POST['programname']) || !empty($_POST['description']) || !empty($_POST['programid'])) {

            echo "<h2>Error</h2>";
            echo "<h5>Sorry, all the required fields are not completed for Program creation. Please try again.</h5>"; 
}     
                    
    ?>        
                    
                                               <hr/>
                
        <h2> Create a new Program </h2> <br>
        
    <form role="form" method="post" action="programs.php" name="createprogram" id="createprogram">
    <fieldset>
        <label for="programname">Program Name:</label>&thinsp;&thinsp;   <input  class="form-control" type="text" name="programname" id="programname" /><br />
        <label for="programid">Program Unique ID:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="programid" id="programid" /><br />
        <label for="description">Description:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="description" id="description" /><br />


        <input class="btn btn-primary" type="submit" name="createprogram" id="createprogram" value="Create Program"/>
<br>
    </fieldset>
    </form>
    
    
    
    
    
    
    
    
      
      <br>
      <hr/>
                
        <h2> Student Programs </h2> <br>
             
                       
                       
                       <!-- EXISTING STUDENT PROGRAMS TABLES -->
                       
                
                      <br>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Striped Rows Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Program ID</th>
                                            <th>Program Name</th>
                                            <th>Program Unique ID</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    
                                    
    $obtainprogramcontentsquery = mysqli_query($dbconnection, "SELECT * FROM Programs");
	
	$numberofrows = mysqli_num_rows($obtainprogramcontentsquery);


if ( $obtainprogramcontentsquery)
{

echo "<tbody>";

while($rowcontents = mysqli_fetch_array($obtainprogramcontentsquery))
        			echo "<tr>
                                            <td>".$rowcontents['ProgramID']."</td>
                                            <td>".$rowcontents['ProgramName']."</td>
                                            <td>".$rowcontents['ProgramUniqueID']."</td>
                                            <td>".$rowcontents['Description']."</td>
                </tr>";
                                        
                                        
echo "</tbody>";
} 

?>
                                    
                                    
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  End  Striped Rows Table  -->
                      </div>

            </div>
            
    
    </div>
             <!-- /. PAGE INNER  -->
            </div>
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
