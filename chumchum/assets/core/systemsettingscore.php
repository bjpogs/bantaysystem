<?php
    session_start();
    include "../../included/sessionchecker.php";
    include "../../included/config.php";
    //edit btn for official
    if(isset($_POST['submit_official']))
    {
        $id = $_POST['resident-id'];
        $oname = $_POST['brgyedit-name'];
        $ochairmanship = $_POST['brgyedit-chairmanship'];
        $oposition = $_POST['brgyedit-position'];

        $sql = "UPDATE official_tbl SET
        official_name = '" . $oname . "',
        official_chairmanship = '" . $ochairmanship . "',
        official_position = '" . $oposition . "'
        WHERE num = " . $id . "
        ";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Official details update successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //edit btn for SK official
    if(isset($_POST['submit_SKofficial']))
    {
        $id = $_POST['resident-id'];
        $oname = $_POST['brgyedit-name'];
        $ochairmanship = $_POST['brgyedit-chairmanship'];
        $oposition = $_POST['brgyedit-position'];

        $sql = "UPDATE skofficial_tbl SET
        skofficial_name = '" . $oname . "',
        skofficial_chairmanship = '" . $ochairmanship . "',
        skofficial_position = '" . $oposition . "'
        WHERE num = " . $id . "
        ";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('SK Official details update successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //add btn for SK official
    if(isset($_POST['submit_SKoadd']))
    {
        $id = $_POST['resident-id'];
        $oname = $_POST['brgyadd-name'];
        $ochairmanship = $_POST['brgyadd-chairmanship'];
        $oposition = "SK Kagawad";

        $sql = "INSERT INTO skofficial_tbl (skofficial_name,skofficial_chairmanship,skofficial_position) VALUES ('" . $oname . "','" . $ochairmanship . "','" . $oposition . "')";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('SK Official details added successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //delete button for SK official
    if(isset($_POST['submit_SKodelete']))
    {
        $id = $_POST['resident-id'];
        $sql = "DELETE FROM skofficial_tbl WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('SK Official details deleted successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //add btn for covid
    if(isset($_POST['submit_covid']))
    {
        $id = $_POST['resident-id'];
        $count = $_POST['covid-num'];
        if ($count == "")
            $count = 0;
        $sql = "UPDATE covid_tbl SET covid_cases = " . $count . " WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Covid cases update successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //add btn for user
    if(isset($_POST['submit_useradd']))
    {
        $username = $_POST['useradd-username'];
        $password = $_POST['useradd-password'];
        $name = $_POST['useradd-name'];
        $usertype = $_POST['useradd-usertype'];

        $sql = "INSERT INTO user_tbl (username,password,name,user_type) VALUES ('" . $username . "','" . $password . "','" . $name . "','" . $usertype . "')";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('User " . $name . " added successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //edit btn for user
    if(isset($_POST['submit_useredit']))
    {
        $id = $_POST['resident-id'];
        $username = $_POST['useredit-username'];
        $password = $_POST['useredit-password'];
        $name = $_POST['useredit-name'];
        $usertype = $_POST['useredit-usertype'];

        $sql = "UPDATE user_tbl SET 
        username = '" . $username . "',
        password = '" . $password . "',
        name = '" . $name . "',
        user_type = '" . $usertype . "'
        WHERE user_id = " . $id . "
        ";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('User " . $name . " update successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //delete btn for users
    if(isset($_POST['submit_userdelete']))
    {
        $id = $_POST['resident-id'];
        $sql = "DELETE FROM user_tbl WHERE user_id = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('User deleted successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //add btn for sitio
    if(isset($_POST['submitAddSitio']))
    {
        include "included/config.php";
        $name = $_POST['sitio-name'];
        $sql = "INSERT INTO sitio_tbl (sitio_name) VALUES ('" . $name . "')";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Sito Added successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //edit btn for sitio
    if(isset($_POST['submit_sitioEdit']))
    {
        $id = $_POST['resident-id'];
        $name = $_POST['sitioedit-name'];
        $sql = "UPDATE sitio_tbl SET sitio_name = '" . $name . "' WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Sito edit successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
    //delete btn for sitio
    if(isset($_POST['submit_sitioDelete']))
    {
        $id = $_POST['resident-id'];
        $sql = "DELETE FROM sitio_tbl WHERE num = " . $id . "";
        if($conn->query($sql) === TRUE)
        {
            $conn->close();
            echo "
            <script>
                alert('Sito delete successfully!');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
        else
        {
            $conn->close();
            echo "
            <script>
                alert('Uh,oh.. I can't process your request, please contact your admin.');
                window.location.href='../../SystemSettings.php';
            </script>
            ";
        }
    }
?>