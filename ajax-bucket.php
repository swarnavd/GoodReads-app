<?php

require __DIR__ . '/Query.php';

// Initializing object for query class.
$ob = new Query();
session_start();
// Adding user and book id in bucket table.
$ob->addBucket($_SESSION['email'], $_POST['book-id']);

