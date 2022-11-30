<?php
include "path.php";
session_start();

unset($_SESSION['id']);
unset($_SESSION['admin']);
unset($_SESSION['firstName']);


header('location: ' . BASE_URL);