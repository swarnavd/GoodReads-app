<?php

$url = $_SERVER['REQUEST_URI'];
$url=explode("?", $url);
switch ($url[0]) {
  case '/':
    require 'Login.php';
    break;
  case '/Login':
    require 'Login.php';
    break;
  case '/Logout':
    require 'logout.php';
    break;
  case '/Admin':
    require 'adminform.php';
    break;
  case '/Bucket':
    require 'bucket.php';
    break;
  case '/Wish':
    require 'wishlist.php';
    break;
  case '/Home':
    require 'dashboard.php';
    break;
  case '/Reset':
    require 'Resetform.php';
    break;
  }
