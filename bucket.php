<?php

require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/profileprocess.php';
require_once __DIR__ . '/bucketprocess.php';

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
          <li><a href="/Wish">Wishlist</a></li>
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
      <table border="1" width="100%">
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Rating</th>
          <th>Image</th>
          <th>Remove</th>
        </tr>
        <?php if (!empty($buckets)) : ?>
          <?php foreach ($buckets as $x) : ?>

            <tr>
              <td><?= $x['bookid'] ?></td>
              <td><?= $x['title'] ?></td>
              <td><?= $x['ratings'] ?></td>
              <td class="timg"><?php echo '<img src="data:image;base64,' . base64_encode($x['book_image']) . ' " class="imb">'; ?></td>
              <td><button type="button" class="remove" name="remove" data-id="<?= $x['bookid'] ?>">Remove</button></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <h1>Bucket list is empty.</h1>
        <?php endif ?>

      </table>
    </div>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
