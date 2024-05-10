<?php

require_once __DIR__ . '/Query.php';
//Initializing object for query class.
$ob = new Query();
session_start();
// Fetching all the bucket products of a particular user.
$buckets = $ob->fetchCart($_SESSION['email']);
