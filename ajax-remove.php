<?php

require_once __DIR__ . '/Query.php';

// Initializing object for query class.
$ob = new Query();
// Session is started to retrive user data who is logged in.
session_start();
// Deletes item on bucketlist which user wants.
$ob->deleteCart($_POST['book-id'], $_SESSION['email']);
// After deletion all book's information are retrieved from bucket table.
$buckets = $ob->fetchCart($_SESSION['email']);
?>

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
