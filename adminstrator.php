<html>
    <head>
        <title>Adminstrator</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">Welcome <?php session_start();
         					echo $_SESSION['name']; ?>
		</div>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="index.php">Signout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
     <div class="container-fluid bg">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form class="form-container">
                       <div>
                           <a href="user_signup.php">Register a Student</a>
                       </div><br>
                        <div>
                            <a href="user_signup.php">Register an Admin</a>
                       </div>
                    </form>
                        <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>
