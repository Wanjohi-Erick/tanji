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
    <section class="main-grid-2">
      <div class="grid-col-1">
        <img src="assets/images/trashcan.jpg" alt="">
      </div>
      <div class="grid-col-2">
        <form action="" novalidate="novalidate" method="post">
          <div class="form">
            <h2>Sign up now</h2>
          <input type="email" placeholder="Email" id="email" name="Email" /> <br>
          <input type="text" placeholder="Phone Number" id="phone" name="phone" /> <br>
          <div class="divide-input">
            <input type="text" placeholder="First Name" id="firstname" name="firstname" /> <br>
            <input type="text" placeholder="Last Name" id="lastname" name="lastname" /> <br>
            <input type="password" name="password" id="password" placeholder="Create Password"> <br>
            <input type="text" placeholder="Region" id="region" name="region" /> <br>
          </div>
          <input type="submit" value="Sign Up" id="signUp" name="signUp">
          <p>Have an account already? <a href="login.html">Sign in</a></p>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
  <script src="js/jquery3.6.0.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</html>

<?php
  if (isset($_POST["signUp"])) {
    require_once('dbConn.php');
    $email = $_POST["Email"];
    $phone = $_POST["phone"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $password = $_POST["password"];
    $region = $_POST["region"];

    $hashedPass = md5($password);
    $checkUserSQL = "SELECT * FROM `users` WHERE `Email` = '$email'";
    $checkUserFx = mysqli_query($connect, $checkUserSQL);
    if (mysqli_num_rows($checkUserFx) > 0) {
      echo "User Already Exists";
    } else {
      $saveSQL = "INSERT INTO `users`(`ID`, `Date`, `Email`, `First Name`, `Last Name`, `Phone`, `Password`, `Region`) VALUES(NULL, CURRENT_TIMESTAMP, '$email', '$firstName', '$lastName', '$phone', '$hashedPass', '$region')";
      $saveQuery = mysqli_query($connect, $saveSQL);
      if ($saveQuery) {
        header('Location: login.php');
      } else {
        $error = mysqli_error($connect);
          echo '
            alert("failed\n '.$error.'");
          ';
      }
    }
  }
?>