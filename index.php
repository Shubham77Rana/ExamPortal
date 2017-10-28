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
        <div class="container-fluid bg">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!--form start-->
                    <form class="form-container" action="admin_login.php" method="POST">
                        <h1>Login Form</h1>
                         <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="username" placeholder="username">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                         <div class="form-group">
                             <label for="user">select school</label><br>
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
    </body>
</html>
