<?php
    include('connection.php');
    $id = $_GET['staff_id'];

    $sql = "DELETE FROM staff_details where staff_id = '$id'";
    mysqli_query($conn, $sql);
    header("location: manage_staff.php");
?>