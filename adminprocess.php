<?php

require_once __DIR__ . '/Query.php';

// Checks if the form is submitted or not.
if (isset($_POST['Submit'])) {
  $entry = new Query();
  $image = file_get_contents($_FILES['image']['tmp_name']);
  // Insert of book details done here.
  $entry->insertBook($image, $_POST['title'],$_POST['genre'], $_POST['date'], $_POST['author'], $_POST['rating']);
  $message = "You added book succesfully!!";
}
