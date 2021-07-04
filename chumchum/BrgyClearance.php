<!DOCTYPE html>
<html>
<?php 
    session_start(); 
    include "included/sessionchecker.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Barangay Permit</title>
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
                    <li class="nav-item"><a class="nav-link active" href="BrgyClearance.php"><i class="far fa-file-alt"></i><span>Barangay Clearance</span></a></li>
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Barangay Clearance</h3>
                    <div class="card shadow">
                        <div class="card-header py-3"><strong style="color: var(--blue);">All Resident</strong></div>
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
                                            <th>Full Name</th>
                                            <th>Alias</th>
                                            <th>Birthdate</th>
                                            <th>Gender</th>
                                            <th>Sitio</th>
                                            <th>Voter status</th>
                                            <th>Civil Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            include "included/config.php";
                                            $sql="SELECT * FROM resident_tbl";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0)
                                            {
                                                while($row = $result->fetch_assoc())
                                                {
                                                    echo '<tr class="item">';
                                                    echo "<td>" . $row['resident_fname'] . " " . $row['resident_mname'] . " " . $row['resident_lname'] . "</td>";
                                                    echo "<td>" . $row['resident_alias'] . "</td>";
                                                    echo "<td>" . $row['resident_bday'] . "</td>";
                                                    echo "<td>" . $row['resident_gender'] . "</td>";
                                                    echo "<td>" . $row['resident_sitio'] . "</td>";
                                                    echo "<td>" . $row['resident_voterstatus'] . "</td>";
                                                    echo "<td>" . $row['resident_civilstatus'] . "</td>";
                                                    echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;"><button data-toggle="modal" data-target="#showBrgyClearance" class="btn btn-primary" type="button" style="margin: 5px;margin-left: 5px;" id="clearance-generate" resname="' . $row["resident_fname"] . ' ' . $row["resident_mname"] . ' ' . $row["resident_lname"] . '">Generate</button></div></td>';
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
                                    <tfoot>
                                        <tr>
                                            <td><strong>Full Name</strong></td>
                                            <td><strong>Alias</strong></td>
                                            <td><strong>Birthdate</strong></td>
                                            <td><strong>Gender</strong></td>
                                            <td><strong>Sitio</strong></td>
                                            <td><strong>Voter Status</strong></td>
                                            <td><strong>Civil Status</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                        <div class="card-footer"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#showBrgyClearance">New Certificate</button></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <!-- data-toggle="modal" data-target="#showCertofIndigency" -->
            <div class="modal fade" id="showBrgyClearance" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Barangay Clearance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="clear-name" class="form-control" id="clearance-add-name" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Purpose:</label>
                                <input type="text" name="clear-purpose" class="form-control" id="clearance-add-purpose" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="clearance-add">Generate</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->
            <?php
                include "included/config.php";
                $sql = "SELECT * from official_tbl where official_position = 'Barangay Captain'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo '<script>var cap = "' . $row['official_name'] . '"; 
                var captain = cap.toUpperCase();</script>';
            ?>
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
    <!-- import for pdf-lib -->
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="assets/js/filesaver.js"></script>
    <script src="assets/js/brgyclearance.js"></script>
</body>

</html>