<?php   
    $host = "feenix-mariadb.swin.edu.au"; // Check if this is the correct hostname
    $user = "s105680164"; // Ensure this is the correct username
    $pwd = "190606"; // Verify the password is correct
    $sql_db = "s105680164_db"; // Confirm database name

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>