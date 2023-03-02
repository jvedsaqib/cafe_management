<?php
    include('connection.php');
    session_start();
    $sql = "DELETE FROM `inter` where staff_id = ".$_SESSION['staff_id']."";
    mysqli_query($conn, $sql);
    header("location: page2.php");
?>