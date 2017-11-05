<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="..bootstrap/css/bootstrap-grid.css" type="text/css">


<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="shadow.css">
<style>
	.form-container{
		margin-top: 10vh;
	}
</style>
</head>
    <body>

	<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand"> WELCOME TO EXAMINATION PORTAL
		</div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form class="form-container form1" action="admin_login.php" method="POST">
                        <h1>Login Form</h1><br>
                         <div class="input-group form-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> Username</span>
                            <input type="text" class="form-control" name="username" placeholder="username">
                        </div>
                         <div class="input-group form-group">
			    <span class="input-group-addon glyphicon glyphicon-lock"> Password</span>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div><br>
                         <div class="form-group">
                             <label><span class="glyphicon glyphicon-education"></span> select school <span class="glyphicon glyphicon-education"></span></label><br>
                        <select id="user" name="school">
                         <option value="DIS">DIS</option>
                          <option value="Army School">Army School</option>
                          </select>
                         </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Remember me
                            </label>
                            </div>
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>
                    <!--form end-->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
            
        </div>
        <?php include("footer.php"); ?>
       
    </body>
     
</html>