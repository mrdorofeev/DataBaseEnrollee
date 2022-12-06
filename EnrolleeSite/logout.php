<?php
session_start();

include "path.php";

unset($_SESSION['id']);
unset($_SESSION['admin']);
unset($_SESSION['firstName']);


header('location: ' . BASE_URL);