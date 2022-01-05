<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanji</title>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.css" />

    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
                        <a href="about.html">About Us</a>
                    </li>
                    <li class="nav-link">
                        <a href="how-tanji-works.html">How Tanji works</a>
                    </li> 
                    <li class="nav-link">
                        <a href="cities.html">Cities</a>
                    </li>   
                </ul>
            </div>
            <div>
              <ul class="nav-user">
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
    <main>
        <section class="main">
            <img src="assets/images/trashcan.jpg" alt="">
            <h2>Sign In</h2>
            <form action="" method="post">
            <div class="form">
                <input type="email" placeholder="Enter your email" id="email" name="Email" /> <br>
                <input type="password" name="password" id="password" placeholder="Enter your Password"> <br>
                <input type="submit" value="Login" id="login" name="login">
            </div>
            </form>
            <p>Don't have an account yet? <a href="signup.html">Sign up</a></p>
        </section>
    </main>
</body>
  <script src="js/jquery3.6.0.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</html>

<?php
  if (isset($_POST["login"])) {
    require_once('dbConn.php');
    $email = $_POST["Email"];
    $password = $_POST["password"];

    $checkUserSQL = "SELECT * FROM `users` WHERE `Email` = '$email'";
    $checkUserFx = mysqli_query($connect, $checkUserSQL);
    $result = mysqli_fetch_array($checkUserFx);
    $dbPass = $result["Password"];
    $firstName = $result["First Name"];
    if (mysqli_num_rows($checkUserFx) == 0) {
      echo '
        <script>
            alert("User Does Not Exist");
        </script>
      ';
    } else {
        $hashedPass = md5($password);
      if ($dbPass != $hashedPass) {
        echo '
        <script>
            alert("Incorrect Login Details");
        </script>
        ';
      } else {
        header('Location: dashboard.php?username='.$firstName.'');
      }
    }
  }
?>