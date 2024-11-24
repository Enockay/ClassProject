<?php
require './database/db.php';
session_start();

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}
?>
