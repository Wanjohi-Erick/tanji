<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tanji</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
</head>
<body class="body">

    <!-------------------Navigation------------------->

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Tanji</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="viewUsers.php?username=<?php
                            $username = $_GET["username"];
                            echo $username;
                        ?>">View Users</a>
                    </li>
                    <li class="nav-link">
                        <a href="collectors.php?username=<?php
                            $username = $_GET["username"];
                            echo $username;
                        ?>">Collectors</a>
                    </li> 
                    <li class="nav-link">
                        <a href="reports.php?username=<?php
                            $username = $_GET["username"];
                            echo $username;
                        ?>">Reports</a>
                    </li> 
                </ul>
            </div>
            <div>
                <ul id="nav-user" class="nav-user">
                    <li class="nav-link">
                        <a href="">Welcome,
                            <?php
                                $username = $_GET["username"];
                                echo '
                                <span id="result">'.$username.'</span>
                                ';
                            ?>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php"><i class="fas fa-user"></i>&nbsp; Logout</a>
                    </li>
                </ul>
              <ul id="nav-login" class="nav-user">
                <li class="nav-link">
                  <i class="text-white fas fa-user-tie"></i> &nbsp;
                  <a href="login.php">Login</a>
                </li> 
                <li class="nav-link">
                  <a href="signup.php">Sign Up</a>
                </li>

              </ul>
            </div>
        </div>
    </nav>

    <!-------------------Navigation------------------->

    <!-----------------Main Site Section----------------->
    <main>
        <section class="container">
            <div class="site-background">
                <div class="site-content">
                  <div class="col-1">
                    <h2>Welcome to <br>
                        your admin<br>
                        account</h2>
                  </div>

                  <div class="col-2">
                    <h2><i class="fas fa-truck"></i></h2>
                  </div>
                </div>
                <a id="signin" href="login.html"><button class="btn btn-primary">Sign In</button></a>
            </div>
        </section>

        <!----------xxx----------Site Content---------xxx------------>

    </main>
    <!---------xxx--------Main Site Section--------xxx--------->
 
    <script>
        var username = document.getElementById("result").value;
        if (username == "") {
           document.getElementById("nav-user").style.display = "none";
        } else {           
            document.getElementById("signin").style.display = "none";
            document.getElementById("nav-login").style.display = "none";
        }
    </script>
    <script src="js/jquery3.6.0.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>