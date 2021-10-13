<?php
session_start();
if(!isset($_SESSION['lms'])) {
    header('Location: login.php?error=Please Login First');
}
?>