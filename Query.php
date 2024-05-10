<?php
require_once __DIR__ . '/Connection.php';
class Query {
  /**
   * A function to insert book details from admin module into database,
   *
   * @param mixed $image
   *  Stores image of a book.
   * @param string $title
   *  Stores image of a book.
   * @param string $genre
   *  Stores genre of a book.
   * @param [type] $date
   *  Stores publication date of a book.
   * @param string $author
   *  Stores author name of a book.
   * @param string $rating
   *  Stores ratings of a book.
   *
   * @return void
   */
  public function insertBook($image, string $title, string $genre, $date, string $author, string $rating) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO book (book_image, title, genre, date, ratings) VALUES(:book_image, :title, :genre, :date, :ratings)");
      $sql->execute(array(':book_image' => $image, ':title' => $title, ':genre' => $genre, ':date' => $date, ':ratings' => $rating));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is exists in database or not.
   *
   * @param String $usr
   * @return void
   */
  public function validUser(String $usr) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$usr'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

/**
 * A function to fetch books from database.
 *
 * @return array
 */
  public function fetchBook() {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("SELECT bookid,title, book_image, ratings, date from book limit 1");
    $sql2->execute();
    $product = $sql2->fetchAll(PDO::FETCH_ASSOC);
    return $product;
  }

  /**
   * A function to fetch books from database.
   *
   * @return array
   */
  public function fetcAll() {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("SELECT bookid,title, book_image, ratings, date from book");
    $sql2->execute();
    $product = $sql2->fetchAll(PDO::FETCH_ASSOC);
    return $product;
  }
/**
 * A function to fetch user details from database.
 *
 * @param string $email
 *  Respective email address of an user.
 *
 * @return void
 */
  public function fetchUser(string $email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM info WHERE email='{$email}'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  /**
   * A function to add a particular book to the bucket list.
   *
   * @param string $email
   *  Stores loogedin user's email.
   * @param [type] $bookid
   *  Stores bookid of a particular user.
   *
   * @return void
   */
  public function addBucket(string $email, int $bookid) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO cart (user_email, bookid) VALUES(:user_email, :bookid)");
      $sql->execute(array(':user_email' => $email, ':bookid' => $bookid));
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to fetch the data which are resides in bucket of a user.
   *
   * @param string $email
   *  Stores email address of loggedin user.
   *
   * @return array
   */
  public function fetchCart(string $email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT b.bookid,b.title, b.ratings, b.book_image,c.user_email FROM book as b  inner join cart as c on b.bookid=c.bookid where c.user_email='{$email}'
");
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  /**
   * A function to delete books from bucket list.
   *
   * @param int $bid
   *  Particluar book id which user added in bucket list.
   * @param string $email
   *  Logged in user's email.
   *
   * @return void
   */
  public function deleteCart(int $bid, string $email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("DELETE FROM cart WHERE user_email='$email' AND bookid='$bid'");
    $sql->execute();
  }

  /**
   * A function to show 1 book whenever user clicks on load more.
   *
   * @param int $start
   *  Offset value.
   *
   * @return array
   */
  public function load(int $start) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM book LIMIT $start,1");
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $all;
  }
  /**
   * A function to sort all the books based on their name.
   *
   * @return array
   */
  public function sortTitle() {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM book ORDER BY title");
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $all;
  }
}
