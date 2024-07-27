<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "kostan";

$koneksi   = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_errno) {
   // This will show the connection error
   echo "Failed to connect to MySQL: (" . $koneksi->connect_errno . ") " . $koneksi->connect_error;
}
