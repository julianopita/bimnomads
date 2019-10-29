<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.createjs.com/1.0.0/createjs.js"></script>

<link  href="fotorama/fotorama.css" rel="stylesheet">
<script src="fotorama/fotorama.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>área externa</title>

<!--shadowbox-->

    <link rel="stylesheet" type="text/css" href="lightbox/lightbox.min.css">
    <script src="lightbox/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript">
    Shadowbox.init();
    </script>

<!--shadowboxEND-->
	
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
<?php include 'forum/webgl_test.php' ?>
<meta name="viewport" content="width=device-width"/> 
</head>
<body onload="init();" leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">
 


<!--cabeçalho-->

<!-- Verify if user is logged and is a moderator; if not, redirects to login-->
<?php
session_start();
if($_SESSION['moderator']<>2)
{
      Print '<script>alert("Usuário não é moderador!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register_login.php");</script>'; // redirects to register.html
      exit;
    }
    ?>
    
<div class="header-div7">

  <?php include 'header_logo.php' ?>

   <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
   <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
   <div class="header-icons-left"> <a href="gallery1.php"><img src="images/proposal.png"  width="48"  align="right" /></a></div>
   <div class="header-icons-left"><a href="maps.php"><img src="images/view-locations.png"  width="50"  align="left" /></a></div>
   <div class="header-icons-left"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
   <div class="header-icons-text"><br>área externa</div>


   <div class="header-icons-right"><img src="images/externa.png" width="50px" title="área externa" align="left"></a></div>
   <div class="header-icons-right"><a href="main2.php"><img src="images/salas.png" width="50px" title="salas de aula" align="right" style="opacity:0.5"></a></div>
   
 </div>
</div>
	<!--conteúdo-->

 
  <div class="discussion-div-grid">
  
      <div class="versions-elements-discussion">
     
    <!--discussion frame. In future versions migrate the php and jscript to separate files-->
   <?php
      session_start();
      $_SESSION['project_id']=2;
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=1;
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
          //selects discussion topics based on versions
      $query = mysql_query("SELECT id_discussion, user_name, relation, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 1 AND project_id = 2"); // SQL Query
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
      </span><form method="post" action="forum/discussion_delete.php">
         <button type="submit" name="id_discussion" value=<?php echo "{$row['id_discussion']}"?>>apagar</button>
      </form></span>
      <a href="forum/discussion_edit.php">editar</a>
       | <span class="caret"></span><br>
       <?php
        // echo " | {$row['likes']} | {$row['dislikes']}<br>";
         echo "{$row['discussion']}"?>
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
     ?><li><?php echo "<br>{$comments['user_name']} | {$date_time_comments} " ?>| 
       <form method="post" action="forum/comment_delete.php">
         <button class="button" type="submit" name="id_comment" value=<?php echo "{$comments['id_comment']}"?>>apagar</button>
      </form>
       
        <a href="comment_edit.php">editar</a><br>

    <a class="nested-commentary"><?php echo "{$comments['commentary']}<br>";?></a></li><?php
              }
              ?>
     
      <?php
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
    this.classList.toggle(".caret-down");
    
  });
}
</script>
<!-- Verify if user is logged and is a moderator; if not, redirects to login-->



<!--like dislike system-->
 </div>
	</div>	 
</div>


<!--rodapé-->
<?php include 'footer_internal_main.php' ?>

</html>
</body>