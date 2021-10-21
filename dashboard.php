<?php
session_start();


echo "Hello " . $_SESSION['name']. " ".$_SESSION['lname'];