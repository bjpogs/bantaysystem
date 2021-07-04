<!DOCTYPE html>
<html>
<?php 
    session_start();
    include "included/sessionchecker.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blotter Record</title>
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
                    <li class="nav-item"><a class="nav-link" href="Dashboard.php"><i class="far fa-chart-bar"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="ResidentInformation.php"><i class="fas fa-user"></i><span>Resident Information</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="CertofIndigency.php"><i class="far fa-file-alt"></i><span>Certificate of Indigency</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="BrgyClearance.php"><i class="far fa-file-alt"></i><span>Barangay Clearance</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="BlotterRecord.php"><i class="far fa-folder"></i><span>Blotter Record</span></a></li>
                    <!-- for admin only -->
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Blotter / Incident Complaint</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow" style="margin-bottom: 15px;">
                                <div class="card-header py-3"><strong style="color: var(--blue);">Blotter Data</strong>
                                    <div class="row">
                                        <div class="col">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="text-md-right input-group dataTables_filter" id="dataTable_filter">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><a><i class="fas fa-search" aria-hidden="true"></i></a></span>
                                                </div>
                                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control form-control-user" aria-controls="dataTable" placeholder="Search">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0 sortable" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Complainant</th>
                                                    <th>Respondent / Dependant</th>
                                                    <th>Blotter / Incident</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form method = "post" action ="assets/core/blottercore.php">
                                                <?php
                                                    include "included/config.php";
                                                    $sql="SELECT * FROM blotter_tbl";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0)
                                                    {
                                                        while($row = $result->fetch_assoc())
                                                        {
                                                            echo '<tr class="item">';
                                                            echo "<td>" . $row['blotter_complainant'] . "</td>";
                                                            echo "<td>" . $row['blotter_defendant'] . "</td>";
                                                            echo "<td>" . $row['blotter_type'] . "</td>";
                                                            echo "<td>" . $row['blotter_date'] . "</td>";
                                                            echo "<td>" . $row['blotter_status'] . "</td>";
                                                            if($row['blotter_status'] == "Settled")
                                                            {
                                                                echo '<td><div class="form-group" style="margin-bottom: 0px;margin-top: 0px;"><button class="btn btn-secondary" type="button" disabled>Settle</button></div></td>';
                                                            }
                                                            else
                                                            {
                                                                echo '<td><div class="form-group" style="margin-bottom: 0px;margin-top: 0px;"><button class="btn btn-primary" type="submit" name="submit" value="' . $row['num'] . '"">Settle</button></div></td>';
                                                            }
                                                            
                                                            echo "</tr>";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "<tr>";
                                                        echo "<td align = 'center' colspan='3'>No Data</td>";
                                                        echo "</tr>";
                                                    }
                                                    $conn->close();
                                                ?>
                                                </form>
                                            </tbody>
                                            
                                            <tfoot>
                                                <tr>
                                                    <td><strong>Complainant</strong></td>
                                                    <td><strong>Respondent / Dependant</strong></td>
                                                    <td><strong>Blotter / Incident</strong></td>
                                                    <td><strong>Date</strong></td>
                                                    <td><strong>Status</strong></td>
                                                    <td><strong>Action</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#showBlotter">Add Blotter / Incident</button></div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                    <?php
                                    include "included/config.php";
                                    $sql = "SELECT * from blotter_tbl WHERE blotter_status = 'Active'";
                                    $result = $conn->query($sql);
                                    $count = mysqli_num_rows($result);
                                    echo '<h2 class="text-left" style="text-align: center;">' . $count . '</h2>';
                                    $conn->close();
                                    ?>
                                </div>
                                <div class="card-footer"><a href="#showActive" data-toggle="modal">Active Cases</a></div>
                            </div>
                            <div class="card" style="margin-bottom: 15px;">
                                <div class="card-body">
                                <?php
                                    include "included/config.php";
                                    $sql = "SELECT * from blotter_tbl WHERE blotter_status = 'Settled'";
                                    $result = $conn->query($sql);
                                    $count = mysqli_num_rows($result);
                                    echo '<h2 class="text-left" style="text-align: center;">' . $count . '</h2>';
                                    $conn->close();
                                    ?>
                                </div>
                                <div class="card-footer"><a href="#showSettle" data-toggle="modal">Settled Cases</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for Add Blotter-->
            <!-- data-toggle="modal" data-target="#showCertofIndigency" -->
            <div class="modal fade" id="showBlotter" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Blotter/Incident Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/blottercore.php" method="post">
                        <div class="modal-body">
                            <!-- complaint -->
                            <div class="form-group">
                                <label for="" class="col-form-label">Complainant:</label>
                                <input type="text" name="blot-complainant" class="form-control" required>
                            </div>
                            <!-- respondent -->
                            <div class="form-group">
                                <label for="" class="col-form-label">Respondent / Defendant:</label>
                                <input type="text" name="blot-respondent" class="form-control" required>
                            </div>
                            <!-- Blotter/Incident -->
                            <div class="form-group">
                                <label for="" class="col-form-label">Report Type:</label>
                                    <select class="custom-select" name="blot-reporttype">
                                    <option selected value="Blotter">Blotter</option>
                                    <option value="Incident">Incident</option>
                                    </select>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label for="" class="col-form-label">Date:</label>
                                <input type="datetime-local" name="blot-date" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit_add" name="submit_add" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Active Cases -->
            <!-- data-toggle="modal" data-target="#showCertofIndigency" -->
            <div class="modal fade" id="showActive" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Active Cases</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- future : view blotter / incident details -->
                        <form action="assets/core/blottercore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table sortable">
                                    <thead>
                                        <tr>
                                            <th>Complainant</th>
                                            <th>Respondent / Dependant</th>
                                            <th>Blotter / Incident</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "included/config.php";
                                        $sql="SELECT * FROM blotter_tbl WHERE blotter_status = 'Active'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo '<tr>';
                                                echo "<td>" . $row['blotter_complainant'] . "</td>";
                                                echo "<td>" . $row['blotter_defendant'] . "</td>";
                                                echo "<td>" . $row['blotter_type'] . "</td>";
                                                echo "<td>" . $row['blotter_date'] . "</td>";
                                                echo '<td><div class="form-group" style="margin-bottom: 0px;margin-top: 0px;"><button class="btn btn-primary" type="submit" name="submit" value="' . $row['num'] . '"">Settle</button></div></td>';
                                                echo "</tr>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr>";
                                            echo "<td align = 'center' colspan='3'>No Data</td>";
                                            echo "</tr>";
                                        }
                                        $conn->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->
            <!-- Modal for Settled Cases -->
            <!-- data-toggle="modal" data-target="#showCertofIndigency" -->
            <div class="modal fade" id="showSettle" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Settled Casese</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- future : view blotter / incident details -->
                        <form action="assets/core/blottercore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table sortable">
                                    <thead>
                                        <tr>
                                            <th>Complainant</th>
                                            <th>Respondent / Dependant</th>
                                            <th>Blotter / Incident</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "included/config.php";
                                        $sql="SELECT * FROM blotter_tbl WHERE blotter_status = 'Settled'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['blotter_complainant'] . "</td>";
                                                echo "<td>" . $row['blotter_defendant'] . "</td>";
                                                echo "<td>" . $row['blotter_type'] . "</td>";
                                                echo "<td>" . $row['blotter_date'] . "</td>";
                                                echo '<td><div class="form-group" style="margin-bottom: 0px;margin-top: 0px;"><button class="btn btn-primary" type="submit_active" name="submit_active" value="' . $row['num'] . '"">Active</button></div></td>';
                                                echo "</tr>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr>";
                                            echo "<td align = 'center' colspan='3'>No Data</td>";
                                            echo "</tr>";
                                        }
                                        $conn->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->
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
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/blotter.js"></script>
</body>

</html>