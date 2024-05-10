<?php
require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/profileprocess.php';
require_once __DIR__ . '/defaultprocess.php';

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
    <button type="button" class="sort" name="sort">Sort by title</button>
    <div class="default-show">
      <?php foreach ($row as $x) : ?>
        <div class="post">

          <h1><?= $x['title'] ?></h1>
          <div class="img-container">
            <?php if (!empty($x['book_image'])) : ?>
              <?php echo '<img src="data:image;base64,' . base64_encode($x['book_image']) . ' " class="im">'; ?>
            <?php endif; ?>
          </div>
          <div class="name">
            Rating : <?= $x['ratings'] ?>
          </div>
          <button type="button" name="bucket" class="bucket" data-id="<?= $x['bookid'] ?>" data-user="<?= $x['email'] ?>">Add to bucket</button>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="load" name="load">Load more</button>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
