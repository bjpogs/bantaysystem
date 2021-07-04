<?php
    $checker = True;
    session_start();
    include "../../included/sessionchecker.php";
    include "../../included/config.php";
    if (isset($_POST['submit_add']))
    {
        $fname = $_POST['add-fname'];
        $mname = $_POST['add-mname'];
        $lname = $_POST['add-lname'];
        $alias = $_POST['add-alias'];
        $bday = $_POST['add-bday'];
        $gender = $_POST['add-gender'];
        $sitio = $_POST['add-sitio'];
        $voter = $_POST['add-voterstatus'];
        $civil = $_POST['add-civilstatus'];
        $sql = "INSERT INTO resident_tbl (resident_fname,resident_mname,resident_lname,resident_alias,resident_bday,resident_gender,resident_sitio,resident_voterstatus,resident_civilstatus) VALUES ('" . $fname . "','" . $mname . "','" . $lname . "','" . $alias . "','" . $bday . "','" . $gender . "','" . $sitio . "','" . $voter . "','" . $civil . "')";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Resident Added Successfully!');
                window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
    }

    if (isset($_POST['submit_edit']))
    {
        $id = $_POST['resident-id'];
        $fname = $_POST['edit-fname'];
        $mname = $_POST['edit-mname'];
        $lname = $_POST['edit-lname'];
        $alias = $_POST['edit-alias'];
        $bday = $_POST['edit-bday'];
        $gender = $_POST['edit-gender'];
        $sitio = $_POST['edit-sitio'];
        $voter = $_POST['edit-voterstatus'];
        $civil = $_POST['edit-civilstatus'];
        $sql = "UPDATE resident_tbl SET
            resident_fname = '" . $fname . "',
            resident_mname = '" . $mname . "',
            resident_lname = '" . $lname . "',
            resident_alias = '" . $alias . "',
            resident_bday = '" . $bday . "',
            resident_gender = '" . $gender . "',
            resident_sitio = '" . $sitio . "',
            resident_voterstatus = '" . $voter . "',
            resident_civilstatus = '" . $civil . "'
            WHERE resident_number = " . $id . "
        ";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
            alert('Resident Information Update Successfully!');
            window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
            alert('Uh,oh.. I can't process your request, please contact your admin.');
            window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
    }

    if (isset($_POST['submit']))
    {
        $id = $_POST['resident-id'];
        $sql = "DELETE FROM resident_tbl WHERE resident_number = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
            alert('Resident Information Update Successfully!');
            window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
            alert('Uh,oh.. I can't process your request, please contact your admin.');
            window.location.href='../../ResidentInformation.php';
            </script>
            ";
        }
    }
?>