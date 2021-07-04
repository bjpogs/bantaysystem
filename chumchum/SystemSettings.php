<!DOCTYPE html>
<html>
<?php 
    session_start(); 
    include "included/sessionchecker.php";
    if ($_SESSION["usertype"] == "User")
    {
        header("Location: Dashboard.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>System Settings</title>
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
                    <li class="nav-item"><a class="nav-link" href="BlotterRecord.php"><i class="far fa-folder"></i><span>Blotter Record</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="SystemSettings.php"><i class="fas fa-cog"></i><span>System Settings</span></a></li>
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
                    <h3 class="text-dark mb-1">System Settings</h3>
                    <hr>
                    <div class="row">
                        <div class="col" style="margin-bottom: 30px;"><button class="btn btn-primary" data-toggle="modal" data-target="#showBrgyOfficials" type="button" style="width: 210px;height: 210px; background: url('assets/img/brgyofficial.jpg') no-repeat;"></button></div>
                        <div class="col" style="margin-bottom: 30px;"><button class="btn btn-primary" data-toggle="modal" data-target="#showSKBrgyOfficials" type="button" style="width: 210px;height: 210px; background: url('assets/img/skofficial.jpg') no-repeat;"></button></div>
                        <div class="col" style="margin-bottom: 30px;"><button class="btn btn-primary" data-toggle="modal" data-target="#showsitiosettings" type="button" style="width: 210px;height: 210px; background: url('assets/img/sitio.jpg') no-repeat;"></button></div>
                        <div class="col" style="margin-bottom: 30px;"><button class="btn btn-primary" data-toggle="modal" data-target="#showUsers" type="button" style="width: 210px;height: 210px; background: url('assets/img/users.jpg') no-repeat;"></button></div>
                        <div class="col" style="margin-bottom: 30px;"><button class="btn btn-primary" data-toggle="modal" data-target="#showCovid" type="button" style="width: 210px;height: 210px; background: url('assets/img/covid.jpg') no-repeat;"></button></div>
                    </div>
                </div>
            </div>
            <!-- Modals -->
            <!-- Modal for Brgy. SK-->
            <div class="modal fade" id="showSKBrgyOfficials" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Barangay SK Officials</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Chairmanship</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "included/config.php";
                                        $sql="SELECT * FROM skofficial_tbl";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0)
                                        {
                                            $row = $result->fetch_assoc();
                                            echo "<tr>";
                                            echo "<td>" . $row['skofficial_name'] . "</td>";
                                            echo "<td>" . $row['skofficial_chairmanship'] . "</td>";
                                            echo "<td>" . $row['skofficial_position'] . "</td>";
                                            echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#SKbarangayEdit" data-dismiss="modal" test="' . $row["num"] . '" oskname="' . $row['skofficial_name'] . '" oskchairmanship="' . $row['skofficial_chairmanship'] . '" oskposition="' . $row['skofficial_position'] . '" style="margin: 5px;margin-left: 5px;">Edit</button>
                                            </div></td>';
                                            echo "</tr>";
                                        }
                                        $sql="SELECT * FROM skofficial_tbl LIMIT 1,18446744073709551615";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['skofficial_name'] . "</td>";
                                                echo "<td>" . $row['skofficial_chairmanship'] . "</td>";
                                                echo "<td>" . $row['skofficial_position'] . "</td>";
                                                # oname="' . $row['official_name'] . '" ochairmanship="' . $row['official_chairmanship'] . '" oposition="' . $row['official_position'] . '"
                                                echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#SKbarangayEdit" data-dismiss="modal" test="' . $row["num"] . '" oskname="' . $row['skofficial_name'] . '" oskchairmanship="' . $row['skofficial_chairmanship'] . '" oskposition="' . $row['skofficial_position'] . '" style="margin: 5px;margin-left: 5px;">Edit</button>
                                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#SKofficialDelete" data-dismiss="modal" test="' . $row["num"] . '" style="margin: 5px;margin-left: 5px;">Delete</button>
                                                </div></td>';
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
                            <button type="submit" data-toggle="modal" data-target="#SKbarangayAdd" data-dismiss="modal" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Brgy. Officials-->
            <div class="modal fade" id="showBrgyOfficials" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Barangay Officials</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Chairmanship</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "included/config.php";
                                        $sql="SELECT * FROM official_tbl";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['official_name'] . "</td>";
                                                echo "<td>" . $row['official_chairmanship'] . "</td>";
                                                echo "<td>" . $row['official_position'] . "</td>";
                                                # oname="' . $row['official_name'] . '" ochairmanship="' . $row['official_chairmanship'] . '" oposition="' . $row['official_position'] . '"
                                                echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#barangayEdit" data-dismiss="modal" test="' . $row["num"] . '" oname="' . $row['official_name'] . '" ochairmanship="' . $row['official_chairmanship'] . '" oposition="' . $row['official_position'] . '" style="margin: 5px;margin-left: 5px;">Edit</button>
                                                </div></td>';
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

            <!-- Modal for Sitio Settings-->
            <div class="modal fade" id="showsitiosettings" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sitio Settings</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sitio Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "included/config.php";
                                            $sql="SELECT * FROM sitio_tbl";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0)
                                            {
                                                while($row = $result->fetch_assoc())
                                                {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['sitio_name'] . "</td>";
                                                    echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#sitioEdit" data-dismiss="modal" test="' . $row["num"] . '" name="' . $row['sitio_name'] . '" style="margin: 5px;margin-left: 5px;">Edit</button>
                                                    <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#sitioDelete" data-dismiss="modal" test="' . $row["num"] . '" style="margin: 5px;margin-left: 5px;">Delete</button>
                                                    </div></td>';
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
                            <hr>
                            <div class="form-group">
                                <label for="" class="col-form-label">Add Sitio:</label>
                                <input type="text" name="sitio-name" class="form-control">
                                <button type="submit" name="submitAddSitio" class="btn btn-primary mt-1">Add</button>
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

            <!-- Modal for Users-->
            <div class="modal fade" id="showUsers" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">All Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="POST">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>User Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "included/config.php";
                                        $sql="SELECT * FROM user_tbl";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo "<tr>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['password'] . "</td>";
                                                echo "<td>" . $row['user_type'] . "</td>";
                                                # name="' . $row['name'] . '" username="' . $row['username'] . '" password="' . $row['password'] . '" usertype="' . $row['user_type'] . '"
                                                echo '<td>&nbsp;<div class="form-group" style="margin-bottom: 0px;margin-top: -25px;">
                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#usersEdit" data-dismiss="modal" test="' . $row["user_id"] . '" name="' . $row['name'] . '" username="' . $row['username'] . '" password="' . $row['password'] . '" usertype="' . $row['user_type'] . '" style="margin: 5px;margin-left: 5px;">Edit</button>
                                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#usersDelete" data-dismiss="modal" test="' . $row["user_id"] . '" style="margin: 5px;margin-left: 5px;">Delete</button>
                                                </div></td>';
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
                            <button type="submit" data-toggle="modal" data-target="#usersAdd" data-dismiss="modal" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Covid Cases-->
            <div class="modal fade" id="showCovid" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Covid Cases</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="col-form-label">Covid Active Cases:</label>
                                <?php 
                                    include "included/config.php";
                                    $sql = "SELECT * FROM covid_tbl WHERE num = 1";
                                    $result = $conn->query($sql);
                                    $rows = $result->fetch_assoc();
                                    echo '<input name = "resident-id" value ="' . $rows["num"] . '" type="hidden">';
                                    echo '<input type="text" name="covid-num" value="' . $rows["covid_cases"] . '" class="form-control">';
                                ?>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_covid" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Official Edit-->
            <div class="modal fade" id="barangayEdit" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Brgy. Official Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="brgyedit-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Chairmanship:</label>
                                <input type="text" name="brgyedit-chairmanship" class="form-control">
                            </div>
                            <!-- dropdown -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_official" class="btn btn-primary" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Official Delete-->
            <div class="modal fade" id="officialDelete" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method="post" action="assets/core/systemsettingscore.php">
                            <div class="modal-body">
                                <input name = "resident-id" type="hidden">
                                <span>Are you sure you want to delete?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="submit_odelete" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end -->

            <!-- Modal for SK Official Edit-->
            <div class="modal fade" id="SKbarangayEdit" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Brgy. SK Official Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="brgyedit-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Chairmanship:</label>
                                <input type="text" name="brgyedit-chairmanship" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_SKofficial" class="btn btn-primary" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for SK Official Add-->
            <div class="modal fade" id="SKbarangayAdd" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Brgy. SK Official Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="brgyadd-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Chairmanship:</label>
                                <input type="text" name="brgyadd-chairmanship" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_SKoadd" class="btn btn-primary" >Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for SK Official Delete-->
            <div class="modal fade" id="SKofficialDelete" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete SK Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method="post" action="assets/core/systemsettingscore.php">
                            <div class="modal-body">
                                <input name = "resident-id" type="hidden">
                                <span>Are you sure you want to delete?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="submit_SKodelete" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end -->

            <!-- Modal for User Add-->
            <div class="modal fade" id="usersAdd" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="useradd-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Username:</label>
                                <input type="text" name="useradd-username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Password:</label>
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password" name="useradd-password" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">User Type:</label>
                                <select class="custom-select" name="useradd-usertype">
                                <option selected value="Admin">Admin</option>
                                <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_useradd" class="btn btn-primary" >Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for User Edit-->
            <div class="modal fade" id="usersEdit" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="useredit-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Username:</label>
                                <input type="text" name="useredit-username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Password:</label>
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password" name="useredit-password" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">User Type:</label>
                                <select class="custom-select" name="useredit-usertype">
                                <option selected value="Admin">Admin</option>
                                <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_useredit" class="btn btn-primary" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for User Delete-->
            <div class="modal fade" id="usersDelete" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method="post" action="assets/core/systemsettingscore.php">
                            <div class="modal-body">
                                <input name = "resident-id" type="hidden">
                                <span>Are you sure you want to delete?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="submit_userdelete" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end -->
            <!-- Modal for Sitio Edit-->
            <div class="modal fade" id="sitioEdit" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sitio Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="assets/core/systemsettingscore.php" method="post">
                        <div class="modal-body">
                            <input name = "resident-id" type="hidden">
                            <div class="form-group">
                                <label for="" class="col-form-label">Name:</label>
                                <input type="text" name="sitioedit-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit_sitioEdit" class="btn btn-primary" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end of Modal -->

            <!-- Modal for Sitio Delete-->
            <div class="modal fade" id="sitioDelete" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method="post" action="assets/core/systemsettingscore.php">
                            <div class="modal-body">
                                <input name = "resident-id" type="hidden">
                                <span>Are you sure you want to delete?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="submit_sitioDelete" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end -->

            <!-- end of Modals -->

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
    <script src="assets/js/systemsettings.js"></script>
</body>
</html>