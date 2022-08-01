<?php

session_start();
if(!isset($_SESSION["admin"])) header("Location: ../../client/login/login.php");