<?php

require __DIR__ . '/Query.php';

// Initializing object.
$ob = new Query();
$row = $ob->load($_POST['offset']);
?>

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
