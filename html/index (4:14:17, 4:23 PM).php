<!-- Including Database Connections -->

<?php include "dbconnection.php"; ?>

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
                        <a class="active-menu"  href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>
                          
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
                  <!--   <h2>Home Page</h2>   
                        <h5>Welcome John Doe , Love to see you back. </h5> -->
                       <body>
                       


<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

    // Let User Access the Main Page since User is already Logged In

     ?>
 
     <h2>Home</h2>
     <h5>You are logged in as <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code></h5>
      
      
      
     
      
     <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{

    // Let User Log In

    $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
    $password = md5(mysqli_real_escape_string($dbconnection, $_POST['password']));
     
    $checklogin = mysqli_query($dbconnection, "SELECT * FROM Users WHERE Username = '".$username."' AND Password = '".$password."'");
     
    if(mysqli_num_rows($checklogin) >= 1)
    {
        $row = mysqli_fetch_array($checklogin);
        $email = $row['EmailAddress'];
         
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h2>Success</h2>";
        echo "<h5>Redirecting you to the Home page...</h5>";
        echo "<meta http-equiv='refresh' content='2;index.php' />";
    }
    else
    {
        echo "<h2>Error</h2>";
        echo "<h5>Sorry, incorrect login details. Please <a href=\"index.php\">click here to try again</a>.</h5>";
    }
}
else
{

	// Display the Login Page to the User
	
    ?>
     
   <h2>Login</h2>
     
   <h5>Please enter your details below to Login. <a href="register.php">Click Here to Register</a>.</h5>
     <br>


    <form role="form" method="post" action="index.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username"> Username:  </label>  &thinsp;&thinsp;&thinsp;&thinsp;    <input class="form-control" type="text" name="username" id="username" /><br />
        <label for="password"> Password:  </label>  &thinsp;&thinsp; &thinsp;&thinsp; <input  class="form-control" type="password" name="password" id="password" /><br />
        <br>
        <input class="btn btn-primary" type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>
     
   <?php
}
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
