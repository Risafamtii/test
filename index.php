<?php

include_once "config.php";

session_start();

if (isset($_SESSION['user'])) {
    header("Location: /digifine/dashboard/index.php");
} 