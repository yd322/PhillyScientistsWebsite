<!-- Including Database Connections -->

<?php include "dbconnection.php"; ?>

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
                <a class="navbar-brand" href="index.php">Philly Scientists</a> 
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
                        <a  class="active-menu" href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>
                          <li  >
                        <a  href="groups.php"><i class="fa fa-table fa-3x"></i> Groups </a>
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
                  <!--   <h2>Profile Page</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                       <body>
                       
                       
                       

<div id="main">
<?php




if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username =  mysqli_real_escape_string($dbconnection, $_POST['username']);
    $password = md5(mysqli_real_escape_string($dbconnection, $_POST['password']));
    $email = mysqli_real_escape_string($dbconnection, $_POST['email']);
    $programid = mysqli_real_escape_string($dbconnection, $_POST['programid']);
    $phone = mysqli_real_escape_string($dbconnection, $_POST['phone']);
     
     $checkusername = mysqli_query($dbconnection, "SELECT * FROM Users WHERE Username = '".$username."'");

        
     if(mysqli_num_rows($checkusername) >= 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back retry with a different username.</p>";
     }
     else
     {
   	   $registerquery = mysqli_query($dbconnection, "INSERT INTO Users (Username, Password, EmailAddress, ProgramID, PhoneNumber) VALUES('".$username."', '".$password."', '".$email."', '".$programid."', '".$phone."')");
		

        if($registerquery)
        {
            echo "<h2>Success</h2>";
            echo "<h5>Your account was successfully created. Please <a href=\"index.php\">Click Here to Login</a>.</h5>";
        }
        else
        {
            echo "<h2>Error</h2>";
            echo "<h5>Sorry, your registration attempt failed. Please go back and try again.</h5>";    
        }       
     }
}
else
{
    ?>
     
   <h2>Register</h2>
     
   <h5>Please enter your details below to Register. If you already have an Account, <a href="index.php">Click Here to Login</a>.</h5>
     <br>
           
       <form role="form" method="post" action="register.php" name="registerform" id="registerform">
    <fieldset>
        <label for="username">Username:</label>&thinsp;&thinsp;   <input  class="form-control" type="text" name="username" id="username" /><br />
        <label for="password">Password:</label>&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;<input  class="form-control" type="password" name="password" id="password" /><br />
        <label for="phone">Phone Number:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="phone" id="phone" /><br />
        <label for="programid">Program ID:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="programid" id="programid" /><br />
        <label for="email">Email:</label>&thinsp;&thinsp;<input  class="form-control" type="text" name="email" id="email" /><br />

        <br>
        <input class="btn btn-primary" type="submit" name="register" id="register" value="Register" />

    </fieldset>
    </form>
     
    <?php
}
?>
 
</div>

                       
                       
            
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
