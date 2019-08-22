<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php' ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fórum</title>
	
	
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
     



    <?php
      session_start();
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=0;
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
          //selects discussion topics based on versions
      $query = mysql_query("SELECT id_discussion, user_name, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 0 AND project_id=3"); // SQL Query
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
         echo "{$row['user_name']} | {$date_time_discussion}"?>  


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
    <span id=discbox>
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="ajude-nos a melhorar a plataforma com sugestões e relatos da experiência"></textarea>
    <button class="button" type="submit" name="submit" id="discussion"><img src="images/arrow_right.png"></button> <br/>
      </form>
      <script>
        const discbox = document.getElementById('discbox');
        discbox.scrollIntoView(false);
      </script>
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