<?php
session_start();
unset($_SESSION["adminPanel_email"]);
header("location: ../");
?>