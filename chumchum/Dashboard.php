<!DOCTYPE html>
<html>
<?php 
    session_start();
    include "included/sessionchecker.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="Dashboard.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fab fa-github"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>bantay</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="Dashboard.php"><i class="far fa-chart-bar"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="ResidentInformation.php"><i class="fas fa-user"></i><span>Resident Information</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="CertofIndigency.php"><i class="far fa-file-alt"></i><span>Certificate of Indigency</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="BrgyClearance.php"><i class="far fa-file-alt"></i><span>Barangay Clearance</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="BlotterRecord.php"><i class="far fa-folder"></i><span>Blotter Record</span></a></li>
                    <?php
                        if($_SESSION["usertype"] == "Admin")
                        {
                            echo '<li class="nav-item"><a class="nav-link" href="SystemSettings.php"><i class="fas fa-cog"></i><span>System Settings</span></a></li>';
                        }
                    ?>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION["name"];?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar5.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="included/destroy.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <div>
                        <h3 style="color: rgb(90,92,105);">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-8">
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <center>
                                    <div class="row">
                                        <div class="col"><img class="img-fluid" src="assets/img/bantaylogo.jpg" style="max-height: 170px;min-width: 170px;"></div>
                                        <div class="col">
                                            <h2 class="text-center" style="margin-top: 37px;">Barangay Bantay</h2>
                                            <h5 class="text-center" style="margin-top: 37px;">Boac, Marinduque</h5>
                                        </div>
                                    </div>
                                    </center>
                                </div>
                            </div>
                            <!-- Barangay Officials -->
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-header text-center" style="background: var(--blue);height: 56px;">
                                    <p style="color: rgb(255,255,255);font-size: 20px;">Current Barangay Officials</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Chairmanship</th>
                                                    <th>Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- barangay officials -->
                                                <?php
                                                    include "included/config.php";
                                                    $tablecontent = True;
                                                    #SELECT * FROM tbl LIMIT 95,18446744073709551615;
                                                    $sql="SELECT * FROM official_tbl ";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0)
                                                    {
                                                        while($row = $result->fetch_assoc())
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['official_name'] . "</td>";
                                                            echo "<td>" . $row['official_chairmanship'] . "</td>";
                                                            echo "<td>" . $row['official_position'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        $tablecontent = True;
                                                    }
                                                    else
                                                    {
                                                        $tablecontent = False;
                                                    }
                                                    $sql="SELECT * FROM skofficial_tbl";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0)
                                                    {
                                                        while($row = $result->fetch_assoc())
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['skofficial_name'] . "</td>";
                                                            echo "<td>" . $row['skofficial_chairmanship'] . "</td>";
                                                            echo "<td>" . $row['skofficial_position'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        $tablecontent = True;
                                                    }
                                                    else
                                                    {
                                                        $tablecontent = False;
                                                    }
                                                    $conn->close();
                                                    if (!$tablecontent)
                                                    {
                                                        echo "<tr>";
                                                        echo "<td align = 'center' colspan='3'>No Data</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Side card ( population / registered voters / covid cases )-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <h4 style="text-align: center;">Total Population</h4>
                                    <hr>
                                    <!-- total population  -->
                                    <?php
                                        include "included/config.php";
                                        $sql = "SELECT * FROM resident_tbl";
                                        $result = $conn->query($sql);
                                        $count = mysqli_num_rows($result);
                                        echo '<h4 class="font-weight-bolder" style="text-align: center;">' . $count . '</h4>';
                                        $conn->close();
                                    ?>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <h4 style="text-align: center;">Registered Voters</h4>
                                    <hr>
                                    <!-- Registered Voter -->
                                    <?php
                                        include "included/config.php";
                                        $sql = "SELECT * FROM resident_tbl WHERE resident_voterstatus = 'Yes'";
                                        $result = $conn->query($sql);
                                        $count = mysqli_num_rows($result);
                                        echo '<h4 class="font-weight-bolder" style="text-align: center;">' . $count . '</h4>';
                                        $conn->close();
                                    ?>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <h4 style="text-align: center;">Covid-19 Active Cases</h4>
                                    <hr>
                                    <!-- covid cases -->
                                    <?php
                                        include "included/config.php";
                                        $sql = "SELECT * FROM covid_tbl";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo '<h4 class="font-weight-bolder" style="text-align: center;">' . $row['covid_cases'] . '</h4>';
                                        $conn->close();
                                    ?>
                                </div>
                            </div>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                <h4 style="text-align: center;">Weather Map</h4>
                                <hr>
                                <iframe src="https://embed.windy.com/embed2.html?lat=13.401&lon=121.995&detailLat=13.401&detailLon=121.995&width=650&height=450&zoom=10&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto" style="height:10px;">
                    <div class="text-center my-auto copyright">
                        <div class="row" style="margin-top:-20px;">
                            <div class="col-12">
                                <span>Copyright © 2021 | All rights reserved.</span>
                            </div>
                            &nbsp;
                            <div class="col-12">
                                <span>Designed with 🖤 by Krzyha-Chumchum</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>