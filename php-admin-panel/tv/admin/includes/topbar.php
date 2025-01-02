<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="mr-2">
                <div class="dropdown">
                    <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if(isset($_SESSION['auth']))
                        { 
                            echo $_SESSION['auth_user']['user_name']; 
                        }
                        else
                        {
                            echo "Not Logged In";
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <form action="code.php" method="POST">
                <button type="submit" name="logout_btn" class="btn btn-info">LogOut</button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
