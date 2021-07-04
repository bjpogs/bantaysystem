<?php
// require for connection
include "config.php";
session_unset();
session_destroy();
// Close connection
$conn->close();

// to check if still connected to database
if (!is_resource($conn))
{
    header("Location: ../index.php");
    /* alert before moving to another page
    echo "<script>
    alert('database successfully closed.');
    window.location.href='../index.php';
    </script>";
    */

}
else
{
    echo "task failed successfully!";
}


?>