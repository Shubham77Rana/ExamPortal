<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">Welcome <?php if(isset($_SESSION['name']))
                    {
                        echo $_SESSION['name'];
                    }
                    else{
                        die();
                        
                    }
                    ?>
		</div>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="adminstrator.php" class="nav">Home</a></li>
                        <li><a href="signout.php" class="nav">Signout</a></li>
                    </ul>
                </div>
            </div>
        </nav>