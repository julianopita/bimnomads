<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div class="header-div">
  <div style="align-self: center"><img src="images/platnomads.jpg" alt="Platnomads logo"> </div>
</div>

 <!--content--> 
  
<div class="discussion-div-grid">
  
  
  
    <span class="versions-elements-discussion">
       
      
   
<!--<div class="versions-div-grid">-->
  
<!--discussion frame. In future versions migrate the php and jscript to separate files-->
    <?php
      session_start();
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=0;
      
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
         //get discussion topics based on versions
      $query = mysql_query("SELECT tag_version, id_discussion, user_name, date_time, discussion, likes, dislikes FROM discussion"); // SQL Query
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

        ?><a href="main<?php echo"{$row['tag_version']}"?>.php"><img src="images/versao-<?php echo"{$row['tag_version']}"?>-100x100.png" width="25px" height="25px" title="versão <?php echo "{$row['tag_version']}"?>"></a> | <?php
         echo "{$row['user_name']} | {$date_time_discussion} | "?> <a href="discussion_comment.php?id_discussion=<?php echo "{$row['id_discussion']}" ?>"> Comentar </a> | <i class="far fa-smile"></i> 0 | <i class="far fa-frown"></i> 0 | <span class="caret"></span><br>
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
     ?><li><?php  echo "<br>{$comments['user_name']} | {$date_time_comments} " ?>| <i class="far fa-smile"></i><span id="react-count-up"> 0</span> | <i class="far fa-frown"></i><span id="react-count-down"> 0</span><br> 

    <a class="nested-commentary"><?php echo "{$comments['commentary']}<br>";?></a></li><?php
              }
              // echo {$comments['likes']} | {$comments['dislikes']}<br>";
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
</script></span>
   <div class="versions-elements-right">
             
    <form action="post.php" method="POST">
  
    <button class="button" type="submit" name="version" id="version" title="iniciar uma conversa" value=0></button> 
  </div>
  
  
</div>

<!--like dislike system-->
		
		
		
      

<!--rodapé-->
<?php include 'footer_internal.php' ?>


</html>
</body>