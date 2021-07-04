<?php
    session_start();
    include "../../included/sessionchecker.php";
    include "../../included/config.php";
    if (isset($_POST['submit']))
    {
        $id = $_POST['submit'];
        $sql = "UPDATE blotter_tbl SET blotter_status = 'Settled' WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
        <script>
            alert('Added to Settled Case');
            window.location.href='../../BlotterRecord.php';
            </script>
        ";
        }
        else
        {
            $conn->close();
            echo "
        <script>
            alert('Uh,oh.. I can't process your request, please contact your admin.');
            window.location.href='../../BlotterRecord.php';
            </script>
        ";
        }
    }

    if (isset($_POST['submit_active']))
    {
        $id = $_POST['submit_active'];
        $sql = "UPDATE blotter_tbl SET blotter_status = 'Active' WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
        <script>
            alert('Added to Active Case');
            window.location.href='../../BlotterRecord.php';
            </script>
        ";
        }
        else
        {
            $conn->close();
            echo "
        <script>
            alert('Uh,oh.. I can't process your request, please contact your admin.');
            window.location.href='../../BlotterRecord.php';
            </script>
        ";
        }
    }

    if(isset($_POST['submit_add']))
    {
        $complainant = $_POST['blot-complainant'];
        $respondent = $_POST['blot-respondent'];
        $reporttype = $_POST['blot-reporttype'];
        $date = $_POST['blot-date'];
        $sql = "INSERT INTO blotter_tbl (blotter_complainant,blotter_defendant,blotter_type,blotter_date,blotter_status) VALUES ('" . $complainant . "','" . $respondent . "','" . $reporttype . "','" . $date . "','Active')";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
        <script>
            alert('Blotter / Incident Added Successfully!');
            window.location.href='../../BlotterRecord.php';
        </script>
        ";
        }
        else
        {
            $conn->close();
            echo "
        <script>
            alert('Uh,oh.. I can't process your request, please contact your admin.');
            window.location.href='../../BlotterRecord.php';
        </script>
        ";
        }
    }
?>