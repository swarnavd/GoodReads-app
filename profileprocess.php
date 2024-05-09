<?php

require_once __DIR__ . '/Query.php';

// Initializing object for query class.
$ob = new Query();
session_start();
// Retrieving all the details of a loggedin user.
$users = $ob->fetchUser($_SESSION['email']);
