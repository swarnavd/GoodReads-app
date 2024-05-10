<?php

require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/profileprocess.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/Home">Home</a></li>
          <li><a href="/Wish" class="wish">Wishlist</a></li>
          <li><a href="/Bucket">Bucketlist</a></li>
          <li><a href="/Logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
        <div class="profile">
          <div class="name1">
            <?= $users['name'] ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <div class="default-show">
      <?php
      // Initializing object for query class.
      $ob = new Query();
      // Collecting all the data which will be published on future date.
      $row = $ob->fetcAll();
      $today = strtotime(date("Y/m/d"));
      ?>
      <table border="1" width="100%">
        <tr>
          <th>Title</th>
          <th>Date</th>
          <th>Image</th>
        </tr>
        <?php foreach ($row as $x) : ?>
          <?php if (strtotime($x['date']) > $today) : ?>
            <tr>
              <td><?= $x['title'] ?></td>
              <td><?= $x['date'] ?></td>
              <td class="timg"><?php echo '<img src="data:image;base64,' . base64_encode($x['book_image']) . ' " class="imb">'; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </table>

    </div>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
