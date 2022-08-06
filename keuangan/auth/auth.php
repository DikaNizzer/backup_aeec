<?php

session_start();
if(!isset($_SESSION["keuangan"])) header("Location: ../../client/login/login.php");