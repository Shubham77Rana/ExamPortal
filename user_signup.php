<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<title>my first page</title>
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
         					echo $_SESSION['name']; ?></div>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="adminstrator.php">Home</a></li>
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
                    <form class="form-container" action="user_register.php" method="POST">
                        <h1>Signup Form</h1>  
                         <div class="form-group">
                            <label for="name">Full-Name</label>
                            <input type="username" class="form-control" name="username" placeholder="Fullname">
                        </div>
                         <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password1" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="password2" placeholder="confirm-password">
                        </div>
                        <div class="form-group">
                            <label for="email">Email-ID</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>  
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                </form>
                        
                    
                    <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>

