<?php
session_start();
if(session_destroy()){
    echo "Do you really want to logout?";
    header("Location:login.php");
}