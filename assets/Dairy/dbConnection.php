<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dairy_management_system";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if($conn->connect_error){
        die("<script> location.href = 'Error.html'; </script>");
    }
?>