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


                    
    ?>        
    
    
            <h2> Teacher Information </h2> 
<hr/> <h3> Name: </h3>   Jane Doe <hr/> <h3> Grade Level: </h3>  Middle School <br><hr/>  <h3> Subjects Taught: </h3>  Biology and Chemistry <br>

              
    
    
    
      
      <br>
      <hr/>
                
        <h2> Student Groups </h2> 
             
             <form action="groupcreate.php">
    <input type="submit" value="Create Group" class="btn btn-primary"/>
</form>

                       
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
                                            <th>Group ID</th>
                                            <th>Group Name</th>
                                            <th>Teacher ID</th>
                                            <th>Program ID</th>
                                            <th>Group Unique Code</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    
                                    
    $obtaingroupcontentsquery = mysqli_query($dbconnection, "SELECT * FROM Groups");
	
	$numberofrows = mysqli_num_rows($obtaingroupcontentsquery);


if ( $obtaingroupcontentsquery)
{

echo "<tbody>";


while($rowcontents = mysqli_fetch_array($obtaingroupcontentsquery))
        			echo "<tr>
                                            <td>".$rowcontents['GroupID']."</td>
                                            <td>".$rowcontents['GroupName']."</td>
                                            <td>".$rowcontents['TeacherID']."</td>
                                            <td>".$rowcontents['ProgramID']."</td>
                                            <td>".$rowcontents['UniqueCode']."</td>
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
