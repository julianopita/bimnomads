<?php
class Reactions {
  /* [DATABASE HELPER FUNCTIONS] */
  protected $pdo = null;
  protected $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    // ATTEMPT CONNECT
    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
      $this->pdo = new PDO(
        $str, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    }

    // ERROR - DO SOMETHING HERE
    // THROW ERROR MESSAGE OR SOMETHING
    catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function exec($sql, $data=null) {
  // exec() : run insert, replace, update, delete query
  // PARAM $sql : SQL query
  //       $data : array of data
 
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond=null, $key=null, $value=null) {
  // fetch() : perform select query
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }

  /* [REACTIONS FUNCTIONS] */
  function get ($postID, $userID=null) {
  // get() : get post likes & dislikes
  // PARAM $postID : the post ID
  //       $userID : optional, get the user's reaction to the post

    $sql = "SELECT `reactions`, COUNT(`reaction`) `total` FROM `reactions` WHERE `id_discussion`=? GROUP BY `reaction`";
    $data = [$postID];


    // This will arrange the number of likes & dislikes by their code
    // Example $total[0] = 123, $total[1] = 456 - There are 123 dislikes and 456 likes
    $total = $this->fetch($sql, $data, "reaction", "total");
    

    // Optional - Get user's reaction to the post
    // This will append the user's reaction to $total
    // Example, if the user likes the post $total['u'] = 1
   // if (is_numeric($userID)) {
    //  $previous = $this->previous($postID, $userID);
     // if ($previous!=false) {
     //   $total['u'] = $previous['reaction'];
   //   }
  //  }

    return $total;
  }

  function previous ($postID, $userID) {
  // previous() : get give user's previous reaction to the post

    $sql = "SELECT * FROM `reactions` WHERE `id_discussion`=? AND `user_name`=?";
    $data = [$postID, $userID];
    $previous = $this->fetch($sql, $data);
    return count($previous)==0 ? false : $previous[0] ;
  }

  function update ($postID, $userID, $react) {
  // update() : update user reaction to post

    // Get previous reaction
    $previous = $this->previous($postID, $userID);

    // No previous reaction - add new
    if ($previous==false) {
      return $this->add($postID, $userID, $react);
    } else {
      // Remove old reaction first
      $pass = $this->remove($postID, $userID);

      // Add new reaction only if it is different from the previous
      if ($pass && $previous['reaction']!=$react) {
        $pass = $this->add($postID, $userID, $react);
      }

      // Return result
      return $pass;
    }
  }

  function add ($postID, $userID, $react) {
  // add() : add a new reaction

    $sql = "INSERT INTO `reactions` (`id_disussion`, `user_name`, `reaction`) VALUES (?, ?, ?)";
    $data = [$postID, $userID, $react];
    return $this->exec($sql, $data);
  }

  function remove ($postID, $userID) {
  // remove() : remove reaction

    $sql = "DELETE FROM `reactions` WHERE `id_discussion`=? AND `user_name`=?";
    $data = [$postID, $userID];
    return $this->exec($sql, $data);
  }
}
?>