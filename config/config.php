<?php

    $username   =   'root';
    $host       =   'localhost';
    $password   =   '';
    $database   =   'orient_ressamlar';

    $conn       = mysqli_connect($host, $username, $password, $database,3306);

    if(!$conn)
    {
        echo "Disconnected";
    }