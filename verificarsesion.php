<?php
session_start();
if (!$_SESSION['loguedo']) {
    header("Location: views/login.view.php");
}