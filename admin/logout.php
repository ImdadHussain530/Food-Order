<?php
include('../config/constants.php');
    //destroy all session
session_destroy();
header('location:'.SITEURL.'admin/login.php');
?>