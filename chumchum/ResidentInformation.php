<!DOCTYPE html>
<html>
<?php 
    session_start(); 
    include "included/sessionchecker.php";
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resident Information</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
</head>

<?php 

?>


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
                    <li class="nav-item"><a class="nav-link active" href="ResidentInformation.php"><i class="fas fa-user"></i><span>Resident Information</span></a></li>
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Resident Information</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="height: 53px;"><strong style="color: var(--blue);">All Resident</strong></div>
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
                                        <!-- Dito data ng table ( connect sa database target )-->
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
                                                    echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                                    <button class="btn btn-primary" type="button" style="margin: 5px;margin-left: 5px;" data-toggle="modal" data-target="#residentModal" test="' . $row["resident_number"] . '" fname="' . $row["resident_fname"] . '" mname ="' . $row["resident_mname"] . '" lname ="' . $row["resident_lname"] . '"  alias="' . $row['resident_alias'] . '" bday="' . $row['resident_bday'] . '" gender="' . $row['resident_gender'] . '" sitio="' . $row['resident_sitio'] . '" voters="' . $row['resident_voterstatus'] . '" civil = "' . $row['resident_civilstatus'] . '" id="editBTN">Edit</button>
                                                    ';
                                                    if($_SESSION["usertype"] == "Admin")
                                                    {
                                                        echo'<button class="btn btn-danger" type="button" style="margin: 5px;margin-left: 5px;" data-toggle="modal" data-target="#deleteModal" test="' . $row["resident_number"] . '" id="deleteBTN">Delete</button>';
                                                    }
                                                    echo '</div></td>';
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
                        <?php
                            if($_SESSION["usertype"] == "Admin")
                            {
                                echo '<div class="card-footer">';
                                echo '<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" type="button">Add Resident</button>';
                                echo '</div>';
                            }
                        ?>
                        <!-- dito code ng modal for Add Resident -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Resident Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <form action="assets/core/residentinformationcore.php" method = "post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Firstname:</label>
                                                            <input name="add-fname" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Middlename:</label>
                                                            <input name="add-mname" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Lastname:</label>
                                                            <input name="add-lname" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Alias:</label>
                                                            <input name="add-alias" type="text" class="form-control" required>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Birthday:</label>
                                                            <input name="add-bday" type="date" autocomplete="off" class="form-control"> 
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Gender:</label>
                                                            <select class="custom-select" name="add-gender">
                                                            <option selected value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Sitio:</label>
                                                    <select class="custom-select" name="add-sitio">
                                                    <!-- from sitio table -->
                                                    <?php 
                                                        include "included/config.php";
                                                        $sql="SELECT * from sitio_tbl";
                                                        $result = $conn->query($sql);
                                                        $meron = True;
                                                        if($result->num_rows > 0)
                                                        {
                                                            $row = $result->fetch_assoc();
                                                            echo '<option selected value="'. $row["sitio_name"] .'">'. $row["sitio_name"] .'</option>';
                                                        }
                                                        else
                                                        {
                                                            $meron = False;
                                                        }
                                                        $sql="SELECT * from sitio_tbl LIMIT 1,18446744073709551615";
                                                        $result = $conn->query($sql);
                                                        if($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc())
                                                            {
                                                                echo '<option value="'. $row["sitio_name"] .'">'. $row["sitio_name"] .'</option>';
                                                            }
                                                            
                                                        }
                                                        if (!$meron)
                                                            echo '<option selected value="--">--</option>';
                                                        
                                                    ?>
                                                    <!--
                                                    <option selected value="Badbad">Badbad</option>
                                                    <option value="Ingas">Ingas</option>
                                                    <option value="Centro">Centro</option>
                                                    <option value="Panugduan">Panugduan</option>
                                                    <option value="Baliis">Baliis</option>
                                                    <option value="Bugo">Bugo</option>
                                                    -->
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Voter Status:</label>
                                                            <select class="custom-select" name="add-voterstatus">
                                                            <option selected value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Civil Status:</label>
                                                            <select class="custom-select" name="add-civilstatus">
                                                            <option selected value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit_add" id="submit_add" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!-- dito end ng modal-->

                        <!-- modal for resident edit -->
                        <div class="modal fade" id="residentModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Resident Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- dito yung form method for data -->
                                    <form method="post" action="assets/core/residentinformationcore.php">
                                        <div class="modal-body">
                                            <input name = "resident-id" type="hidden">
                                            <!-- test -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Firstname:</label>
                                                        <input name="edit-fname" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Middlename:</label>
                                                        <input name="edit-mname" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Lastname:</label>
                                                        <input name="edit-lname" type="text" class="form-control" required >
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Alias:</label>
                                                        <input name="edit-alias" type="text" class="form-control" >   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- calendar dapat -->
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Birthday:</label>
                                                        <input name="edit-bday" type="date" autocomplete="off" class="form-control"> 
                                                    </div>
                                                </div>
                                                <!-- dropdown dapat -->
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Gender:</label>
                                                        <select class="custom-select" name="edit-gender">
                                                        <option selected value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- dropdown dapat -->
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Sitio:</label>
                                                <select class="custom-select" name="edit-sitio">
                                                <!-- from sitio table -->
                                                <?php 
                                                        include "included/config.php";
                                                        $sql="SELECT * from sitio_tbl";
                                                        $result = $conn->query($sql);
                                                        $meron = True;
                                                        if($result->num_rows > 0)
                                                        {
                                                            $row = $result->fetch_assoc();
                                                            echo '<option selected value="'. $row["sitio_name"] .'">'. $row["sitio_name"] .'</option>';
                                                        }
                                                        else
                                                        {
                                                            $meron = False;
                                                        }
                                                        $sql="SELECT * from sitio_tbl LIMIT 1,18446744073709551615";
                                                        $result = $conn->query($sql);
                                                        if($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc())
                                                            {
                                                                echo '<option value="'. $row["sitio_name"] .'">'. $row["sitio_name"] .'</option>';
                                                            }
                                                            
                                                        }
                                                        if (!$meron)
                                                            echo '<option selected value="--">--</option>';
                                                        
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- dropdown dapat -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Voter Status:</label>
                                                        <select class="custom-select" name="edit-voterstatus">
                                                        <option selected value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Civil Status:</label>
                                                        <select class="custom-select" name="edit-civilstatus">
                                                        <option selected value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit_edit" name="submit_edit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        <!-- Modal for Delete-->
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Resident</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form method="post" action="assets/core/residentinformationcore.php">
                                        <div class="modal-body">
                                            <input name = "resident-id" type="hidden">
                                            <span>Are you sure you want to delete?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
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
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/residentinformation.js"></script>
</body>
</html>