<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
function new_db_connection()
{
    // Define working environment
    //$env = "localhost";
    $env = "labmm";

    // Variables for the database connection
    if ($env == "labmm") {
        $hostname = 'labmm.clients.ua.pt';
        $username = "deca_20L4_31_web";
        $password = "MnJ83u0r";
        $dbname = "deca_20l4_31";
    }
    if ($env == "localhost") {
        $hostname = 'localhost';
        $username = "root";
        $password = "";
        $dbname = "deca_20l4_31";
    }

// Makes the connection
    $local_link = mysqli_connect($hostname, $username, $password, $dbname);

// If it fails to connect then die and show errors
    if (!$local_link) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Define charset to avoid special chars errors
    mysqli_set_charset($local_link, "utf8");

    // Return the link
    return $local_link;
}