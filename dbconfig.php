<?php

    $host = "localhost";
    $db_name = "punchin";
    $username = "root";
    $password = "";
    $conn = null;

    //susceptible to change
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
