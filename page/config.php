<?php 

// Enable full error reporting for debugging awash rapaort dadate lasar away erro habe 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters awanash nawy database user 
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'careers';

// Connect to the database awash vareblakana 
$db = mysqli_connect($host, $user, $password, $database);

// Check the connection awa check dakatawa bzanen erro haya
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!function_exists('sanitize')) {
    function sanitize($data){
        global $db;
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        $data = mysqli_real_escape_string($db, $data);
        return $data;
    }
}
?>
