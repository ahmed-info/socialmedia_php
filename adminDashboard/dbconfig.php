<?php
session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "chat";
    $connection = mysqli_connect($host,$user,$pass,$data) OR die("error");
    ?>