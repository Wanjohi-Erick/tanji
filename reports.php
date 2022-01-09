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
                <th>Date</th>
                <th>User</th>
                <th>Collector</th>
                <th>Payment Amount</th>
                <th>Payment Method</th>
                <th>Action</th>
                
            </thead>
            <tbody>
                <?php
                require "dbConn.php";
                    $getFromInputSql = "SELECT * FROM `orders`";
                    $getFromInputQuery = mysqli_query($connect, $getFromInputSql);
                    

                    while($resultFromInput = mysqli_fetch_array($getFromInputQuery)){
                        $id = $resultFromInput["ID"];
                        $date = $resultFromInput["Date"];
                        $userName = $resultFromInput["User"];
                        $collector = $resultFromInput["Collector"];
                        $paymentAmount = $resultFromInput["Payment Amount"];
                        $paymentMethod = $resultFromInput["Payment Method"];

                        echo'
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$date.'</td>
                            <td>'.$userName.'</td>
                            <td>'.$collector.'</td>
                            <td>'.$paymentAmount.'</td>
                            <td>'.$paymentMethod.'</td>
                            <td><a class = "link" href="update.php" target="_blank" rel="noopener noreferrer">Update</a> | 
                                <a class = "link" href="delete.php" target="_blank" rel="noopener noreferrer">Delete</a> |
                                <a class = "link" href="#modal-opened'.$id.'" id="modal-closed">Generate Report</a>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </main>
    <div class="modal-container" id="modal-opened<?php echo $collector;?>">
        <div class="modal">
            <p class="modal__text">
                <?php
                    $getRecordSQL = "SELECT * FROM `orders` WHERE `ID` = '$id'";
                    $getRecordQueryFX = mysqli_query($connect, $getFromInputSql);
                    $resultRecord = mysqli_fetch_array($getRecordQueryFX);
                    $collector = $resultRecord["Collector"];
                    echo $collector;
                ?>
            </p>
            
            <a href="#modal-closed"><button class="modal__btn">Close</button></a>
        </div>
    </div>

<a href="https://codepen.io/AbubakerSaeed/full/eYOvKpY" class="second-version-link" target="_blank">CSS Modals (Modal v2)</a>

<a href="https://abubakersaeed.netlify.app/designs/d7-modal" class="abs-site-link" rel="nofollow noreferrer" target="_blank">abs/designs/d7-modal</a>
    <!---------xxx--------Main Site Section--------xxx--------->
    <script src="js/jquery3.6.0.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>