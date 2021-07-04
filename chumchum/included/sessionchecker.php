<?php 
if(!isset($_SESSION["name"]))
{
    try {
        if($checker)
            echo "
                <script>
                window.location.href='../../index.php';
                </script>
            ";
        else
            echo "
                <script>
                window.location.href='index.php';
                </script>
            ";

    } catch (Exception $e) {
        echo "
            <script>
            window.location.href='index.php';
            </script>
        ";
    }
}
?>