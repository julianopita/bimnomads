<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php' ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fórum</title>
	
	<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#ff0000">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ff0000">
	
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial, sans-serif;
}
body {
	margin-left: 50px;
}
</style>
<meta name="description" content="Platnomads" />
</head>
<body topmargin="50px" marginheight="50px">

<!--header-->
<?php include 'header_logo.php' ?>

 <!--content--> 
  
<div class="discussion-div-grid">
  
  
  
    <div class="versions-elements-discussion">
       
      
   
<!--<div class="versions-div-grid">-->
  
<!--discussion frame. In future versions migrate the php and jscript to separate files-->
     <script type="text/javascript">

  

     function insert_like_discussion(id)
    { var id_discussion = id;

      $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_like_discussion: "like", id: id,
             },
      success: function (id) {

        $("#like"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="unlike<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000fff" onclick="insert_unlike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i>');
        $("#dislike"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #C0C0C0";)></i>');   
    }
      });
    }

    function insert_dislike_discussion(id)
    { var id_discussion = id;
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_dislike_discussion:"dislike", id:id,
      },
      success: function (id) {
        
        $("#like"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #C0C0C0";)></i>');
        $("#dislike"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="undislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000fff" onclick="insert_undislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i>');
           
    }
      });
    }

     function insert_unlike_discussion(id)
    { var id_discussion = id;
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_unlike_discussion:"unlike", id:id,
      },
      success: function (id) {
        
        $("#unlike"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000000" onclick="insert_like_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $like['likes']; ?>');
        $("#dislike"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000000" onclick="insert_dislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $dislike['dislikes']; ?>');
           
    }
      });
    }

    function insert_undislike_discussion(id)
    { var id_discussion = id;
    $.ajax({
      type: 'post',
      url: 'forum/store_rating.php',
      data: {
        post_undislike_discussion:"undislike", id:id,
      },
      success: function (id) {
        
        $("#undislike"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000000" onclick="insert_like_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $like['likes']; ?>');
        $("#like"+id_discussion).replaceWith('<i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000000" onclick="insert_dislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $dislike['dislikes']; ?>');
           
    }
      });
    }

  </script>



    <?php
      session_start();
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=0;
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
          //selects discussion topics based on versions
      $query = mysql_query("SELECT id_discussion, user_name, relation, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 0"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
        ?>
        <ul id="discussions">
        <li>
        <?php
        //convert sql date_time to desired format. Include  %H:%M:%S at strftime to display the hour
        setlocale(LC_ALL, 'pt_BR.UTF-8','ptb_ptb');
        $time = strtotime($row['date_time']);
        $date_time_discussion = strftime("%d %B, %Y", $time);

        //shows discussions
         echo "{$row['user_name']} | {$date_time_discussion} | {$row['relation']} | "?>  
<?php
         if (isset($_SESSION['loggedin'])) 

           {

            $countlike = mysql_query("SELECT COUNT(*) AS likes FROM reactions WHERE reaction='like' AND id_discussion=$id_discussion {$row['id_discussion']}");
            $countdislike = mysql_query("SELECT COUNT(*) AS dislikes FROM reactions WHERE reaction='dislike' AND id_discussion=$id_discussion {$row['id_discussion']}");
        
        $like =mysql_fetch_assoc($countlike);
        $dislike =mysql_fetch_assoc($countdislike);
        
            
       

            $testlike = mysql_query("SELECT COUNT(*) AS testlikes FROM reactions WHERE reaction='like' AND id_discussion=$id_discussion {$row['id_discussion']} AND user_name='$user_id'");
            $testdislike = mysql_query("SELECT COUNT(*) AS testdislikes FROM reactions WHERE reaction='dislike' AND id_discussion=$id_discussion {$row['id_discussion']} AND user_name='$user_id'");
            
            $testlikes = mysql_fetch_assoc($testlike);
            $testdislikes = mysql_fetch_assoc($testdislike);
                            
            

            if ($testlikes['testlikes'] == 0 AND $testdislikes['testdislikes'] == 0)
            {?>
            
             <i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000000" onclick="insert_like_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i><?php echo $like['likes']; ?>
             <i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000000" onclick="insert_dislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $dislike['dislikes'];         
              }
            else
            {if ($testlikes['testlikes'] == 1 AND $testdislikes['testdislikes'] == 0)
              { ?>
              <i <?php $id_likedislike=$row['id_discussion'];?> id="unlike<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000fff" onclick="insert_unlike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $like['likes']; ?>
              <i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #C0C0C0"></i><?php echo $dislike['dislikes']; ?>
          <?php
              }
              else
              { ?>
              <i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #C0C0C0"></i> <?php echo $like['likes']; ?>
               <i <?php $id_likedislike=$row['id_discussion'];?> id="undislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000fff" onclick="insert_undislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i><?php echo $dislike['dislikes']; ?> 
              
          <?php
              }
             }
                    
            }
         
          else 
          {
         $countlike = mysql_query("SELECT COUNT(*) AS likes FROM reactions WHERE reaction='like' AND id_discussion=$id_discussion {$row['id_discussion']}");
         $countdislike = mysql_query("SELECT COUNT(*) AS dislikes FROM reactions WHERE reaction='dislike' AND id_discussion=$id_discussion {$row['id_discussion']}");
        
        $like =mysql_fetch_assoc($countlike);
        $dislike =mysql_fetch_assoc($countdislike);

         ?>
         | <i class="far fa-smile" style="color: #C0C0C0"></i> <?php echo $like['likes']; ?>
         | <i class="far fa-frown" style="color: #C0C0C0"></i> <?php echo $dislike['dislikes']; ?>
      <?php
           };
         ?>

       | <span class="caret"></span><br>
       <?php
        // echo " | {$row['likes']} | {$row['dislikes']}<br>";
         echo "{$row['discussion']}<br>";
         ?>
         </span>
         <ul class="nested">
         <?php   
            //access the table comments based on the id_discussion of the table discussion to compare them
             $query_comments = mysql_query("SELECT discussion, id_comment, user_name, date_time, commentary, likes, dislikes FROM comments WHERE discussion= '{$row['id_discussion']}'");// SQL Query;
             while($comments=mysql_fetch_array($query_comments))
             { 
              //convert sql date_time to desired format. Include  %H:%M:%S at strftime to display the hour
               setlocale(LC_ALL, 'pt_BR.UTF-8','ptb_ptb');
               $time = strtotime($comments['date_time']);
               $date_time_comments = strftime("%d %B, %Y", $time);
               //print the comments. As only the comments which id_discussion is relevant where written to the $id_discussion array, no need to use conditional statements to filter them.
     ?><li><?php  echo "<br>{$comments['user_name']} | {$date_time_comments} " ?>|<br> 

    <a class="nested-commentary"><?php echo "{$comments['commentary']}<br>";?></a></li><?php
              }
              // echo {$comments['likes']} | {$comments['dislikes']}<br>";
            
              if(isset($_SESSION['loggedin']))
              {
               ?>
              <form name="comments" action="forum/comment_post.php" method="POST">
                  <span>
                     <textarea data-ls-module="charCounter" maxlength="200" class="input-comment2" name="commentary" id="commentary" required="required" placeholder="comente nesta conversa (máximo de 200 caracteres)"></textarea>
                     <input type="hidden" id="id_discussion" name="id_discussion" value="<?php echo "{$row['id_discussion']}";?>">
                  <button class="button" type="submit" name="submit" id="commentary"><img src="images/arrow_right_grey.png"></button> <br/>
                    </form>
                    </span>
                    <?php;
              } else {

                ?><span>
                     <textarea data-ls-module="charCounter" maxlength="0" class="input-comment2" name="discussion" id="discussion" required="required" placeholder="registre-se para postar uma resposta!"></textarea></span>
                <?php;
              }
              ?>
             </ul>
          </li>
      </ul>
      <?php
      }
    ?>
<!--jscript to expand the commentaries for each discussion-->
<script>
  var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");          
    this.classList.toggle("caret-down");
    
  });
}
</script>
<!-- Verify if user is logged; if not, disables the posting area-->
<?php
if(isset($_SESSION['loggedin']))
{
  ?>
<form name="discussion" action="forum/post_comment.php" method="POST">
    <span>
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="inicie aqui sua conversa (máximo de 200 caracteres)"></textarea>
    <button class="button" type="submit" name="submit" id="discussion"><img src="images/arrow_right.png"></button> <br/>
      </form>
      </span>
      <?php;
} else {

  ?><span>
       <textarea data-ls-module="charCounter" maxlength="0" class="input-comment" name="discussion" id="discussion" required="required" placeholder="registre-se para iniciar uma conversa!"></textarea></span>
  <?php;
}
?>

<!--like dislike system-->
 
 </div>
 <div class="arrow-right" style="margin-top:150px">
<a href="index.php"><img src="images/arrow_right_black.png" align="right"/></a>
</div>
  
  
</div>

<!--like dislike system-->
		
		
		
      

<!--rodapé-->
<?php include 'footer_internal.php' ?>


</html>
</body>