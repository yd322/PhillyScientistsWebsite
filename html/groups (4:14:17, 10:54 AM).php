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
    <title>BioKids</title>
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
                <a class="navbar-brand" href="index.php">Bio Kids</a> 
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
                        <a  href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>

					 <li  >
                        <a class="active-menu"  href="groups.php"><i class="fa fa-table fa-3x"></i> Groups </a>
                    </li>
                    
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

if(!empty($_POST['groupname']) && !empty($_POST['teacherid']) && !empty($_POST['programid']) && !empty($_POST['uniquecode']))
{

    $groupname =  mysqli_real_escape_string($dbconnection, $_POST['groupname']);
    $teacherid = mysqli_real_escape_string($dbconnection, $_POST['teacherid']);
    $programid = mysqli_real_escape_string($dbconnection, $_POST['programid']);
    $uniquecode = mysqli_real_escape_string($dbconnection, $_POST['uniquecode']);
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
                    
    ?>        
                    
                     <h2>Groups</h2>   
                                               <hr/>
                
        <h3> Create a new Student Group </h3> <br>
        
    <form role="form" method="post" action="groups.php" name="creategroup" id="creategroup">
    <fieldset>
        <label for="groupname">Group Name:</label>&thinsp;&thinsp;   <input  class="form-control" type="text" name="groupname" id="groupname" /><br />
        <label for="teacherid">Teacher ID:</label>&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;<input  class="form-control" type="text" name="teacherid" id="teacherid" /><br />
        <label for="programid">Program ID:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="programid" id="programid" /><br />
        <label for="uniquecode">Unique Code for the Group:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="uniquecode" id="uniquecode" /><br />
        <label for="description">Description:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="description" id="description" /><br />

        <input class="btn btn-primary" type="submit" name="creategroup" id="creategroup" value="Create Group"/>
<br>
    </fieldset>
    </form>
    
    
    
    
    
    
    
    
      
      <br>
      <hr/>
                
        <h3> Existing Student Group Data </h3> <br>
             
                       
                       
                       <!-- EXISTING STUDENT GROUP DATA TABLES -->
                       
                
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
                                            <th>#</th>
                                            <th>Group Name</th>
                                            <th>Teacher ID</th>
                                            <th>Program ID</th>
                                            <th>Group Unique Code</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    
                                    
    $obtaingroupcontentsquery = mysqli_query($dbconnection, "SELECT GroupName FROM Groups");
	
	$numberofrows = mysqli_num_rows($obtaingroupcontentsquery);


if ( $obtaingroupcontentsquery)
{

echo "<tbody>";

for ($i=0; $i<$numberofrows; $i++)
			echo "<tr>
                                            <td>2</td>
                                            <td>Fill1</td>
                                            <td>Fill2</td>
                                            <td>Fill3</td>
                                            <td>Fill4</td>
                                            <td>Fill5</td>
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
            <!--
              <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-5">
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
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  End  Striped Rows Table  -->
                      </div>
            -->
              <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-5">
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
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  End  Striped Rows Table  -->
                    
                <!-- /. ROW  -->
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
