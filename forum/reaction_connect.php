<?php 





}

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $post_id = $_POST['id_discussion'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO reactions (user_name, id_discussion, rating_action) 
         	   VALUES ($user_name, $id_discussion, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO reactions (user_id, post_id, rating_action) 
               VALUES ($user_name, $id_discussion, 'dislike') 
         	   ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM reactions WHERE user_name=$user_id AND id_discussion=$post_id";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM reactions WHERE user_name=$user_id AND id_discussion=$post_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($conn, $sql);
  echo getRating($post_id);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM reactions 
  		  WHERE id_discussion = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM reactions
  		  WHERE id_discussion = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM reactions WHERE id_discussion = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM reactions 
		  			WHERE id_discussion = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM reactions WHERE user_name=$user_id 
  		  AND id_discussion=$post_id AND rating_action='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM reactions WHERE user_name=$user_id 
  		  AND id_discussion=$post_id AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}
?>
