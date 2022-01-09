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
            </div>
        </div>
    </nav>

    <!-------------------Navigation------------------->

    <!-----------------Main Site Section----------------->
    <main>
        <table class="table table-hover table-striped text-center">
            <thead class="thead">
                <th>ID</th>
                <th>Name</th>
                <th>Tagline</th>
                <th>Price Per Kilometer </th>
                <th>Action</th>
                
            </thead>
            <tbody>
                <?php
                require "dbConn.php";
                    $getFromInputSql = "SELECT * FROM `collectors`";
                    $getFromInputQuery = mysqli_query($connect, $getFromInputSql);
                    

                    while($resultFromInput = mysqli_fetch_array($getFromInputQuery)){
                        $id = $resultFromInput["ID"];
                        $name = $resultFromInput["Name"];
                        $tagline = $resultFromInput["Tagline"];
                        $ppKilometer = $resultFromInput["Price Per Kilometer"];

                        echo'
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$tagline.'</td>
                            <td>'.$ppKilometer.'</td>
                            <td><a class = "link" href="update.php" target="_blank" rel="noopener noreferrer">Update</a> | 
                                <a class = "link" href="delete.php" target="_blank" rel="noopener noreferrer">Delete</a>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </main>
    <!---------xxx--------Main Site Section--------xxx--------->
    <script src="js/jquery3.6.0.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>