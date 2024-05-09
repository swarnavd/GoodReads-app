<?php

require_once __DIR__ . '/adminprocess.php';
require_once __DIR__ . '/sessioncheck.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./CSS/landing-style.css">
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/Home">Home</a></li>
          <li><a href="/Logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <form action="/Admin" method="post" enctype="multipart/form-data" class="form">
      <h3><?= $message ?>!!!</h3></br>
      <label for="image">Upload a book's image</label>
      <input type="file" id="image" name="image" accept="image/*" class="in">
      <label for="title">Upload a book's title</label>
      <input type="text" id="title" name="title">
      <label for="genre">author's genre</label>
      <input type="text" id="genre" name="genre">
      <label for="date">Upload a book's publication date</label>
      <input type="date" id="date" name="date">
      <label for="author">author's name</label>
      <input type="text" id="author" name="author">
      <label for="rating">Upload a book's rating</label>
      <input type="text" id="rating" name="rating">
      <input type="submit" name="Submit" class="sub">

    </form>
  </main>
</body>

</html>
