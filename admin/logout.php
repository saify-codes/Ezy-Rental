<?php
session_start();
unset($_SESSION['loggedin']);
header("location:login.php");