<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php';?>

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



<div class="header-div7">

  <?php include 'header_logo.php' ?>

   <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
   <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
   <div class="header-icons-left"> <a href="gallery1.php"><img src="images/proposal.png"  width="48"  align="right" /></a></div>
   <div class="header-icons-left"><a href="maps.php"><img src="images/view-locations.png"  width="50"  align="left" /></a></div>
   <div class="header-icons-left"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
   <div class="header-icons-text"><br>área externa</div>

  <div class="header-icons-right"><a href="main3.php"><img src="images/logo apae.png" width="50px" title="briefing" align="right" style="opacity:0.5"></a></div>
   <div class="header-icons-right"><img src="images/externo_thumbs.png" width="50px" title="área externa" align="right"></a></div>
   <div class="header-icons-right"><a href="main2.php"><img src="images/salas_thumbs.png" width="50px" title="salas de aula" align="right" style="opacity:0.5"></a></div>
   
   
 </div>
</div>
	<!--conteúdo-->
<div class="versions-div-grid">
 <div class="versions-elements-left">
     
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
      $_SESSION['version']=1;
      include 'forum/event_checker.php';
      $allow_posting = $_SESSION['allow_posting'];

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
            
		if (isset($_SESSION['loggedin']) && $_SESSION['allow_posting'] == 0)
		{ if ($_SESSION['technical'] == 2)
      {
			?>
			<form name="comments" action="forum/comment_post.php" method="POST">
                  <span>
                     <textarea data-ls-module="charCounter" maxlength="200" class="input-comment2" name="commentary" id="commentary" required="required" placeholder="comente nesta conversa como equipe técnica"></textarea>
                     <input type="hidden" id="id_discussion" name="id_discussion" value="<?php echo "{$row['id_discussion']}";?>">
                  <button class="button" type="submit" name="submit" id="commentary"><img src="images/arrow_right_grey.png"></button> <br/>
                    </form>
                    </span>
                    <?php
                }
                else
                {
                  ?>
                  <span>
                     <textarea data-ls-module="charCounter" maxlength="200" class="input-comment2" name="commentary" id="commentary" required="required" placeholder="aguarde retorno da equipe técnica"></textarea>
                    
                  <button class="button" type="submit" name="submit" id="commentary"><img src="images/arrow_right_grey.png"></button> <br/>
                    
                    </span>
                  <?php
                }
              }
                else
                {  
              if(isset($_SESSION['loggedin']) && $_SESSION['allow_posting'] == 1)
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

<!-- Verify if posting is allowed; if not, enables the posting area only to tech-->
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['allow_posting'] == 0)
{ if ($_SESSION['technical'] == 2)
{
?>
<form name="discussion" action="forum/post_comment.php" method="POST">
    <span id=discbox>
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="poste um novo comentário como equipe técnica"></textarea>
    <button class="button" type="submit" name="submit" id="discussion"><img src="images/arrow_right.png"></button> <br/>
      </form>
      <script>
        const discbox = document.getElementById('discbox');
        discbox.scrollIntoView(false);
      </script>
      </span>
      <?php;
}
 else
{
 ?>
<span>
 <textarea data-ls-module="charCounter" maxlength="200" class="input-comment2" name="commentary" id="commentary" required="required" placeholder="aguarde retorno da equipe técnica"></textarea>
                    
 <button class="button" type="submit" name="submit" id="commentary"><img src="images/arrow_right.png"></button> <br/>
                    
 </span>
<?php
 }
}
else
{
?>
<!-- Verify if user is logged; if not, disables the posting area-->
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['allow_posting'] == 1)
{
  ?>
<form name="discussion" action="forum/post_comment.php" method="POST">
    <span id=discbox>
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="contribua para o projeto da área externa (máximo de 200 caracteres)"></textarea>
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
}

?>

<!--like dislike system-->
 </div>
	
 <div class="versions-elements-center"> 
  <?php
  //Reads cookie from project.php. This cookie stays persistent through versions.
  $webgl = $_COOKIE['webgl'];
  if ($webgl == 1) 
  {
  // WebGL supported. Loads interactive 3D model.
  ?>    
 <div id="viewer" class="versions-elements-center" style="position: relative;">
  
                 
    <canvas id="canvas" style="width:450px; height:350px; border:2px solid #C0C0C0; position: absolute; left: 0; top: 0; z-index: 90000;"></canvas>
            
    <div id="progressbar">
      <div id="progress"></div>
    </div>
    </div>
  <script src="gl-matrix.js"></script>
  <script type="module">
  /**
 * This class will return the API address for a BIMserver Client
 */

export class Address {
  static getApiAddress() {
    var pathname = document.location.pathname;
    if (pathname.length > 16 && pathname.indexOf("http://www.nomads.usp.br:8080/bimserver/apps/bimsurfer3/") != -1) {
      // We assume that BIMsurfer 3 is being served from a BIMserver and that this is also the BIMserver we would like to connect to
      const href = document.location.href;
      return href.substring(0, href.indexOf("http://www.nomads.usp.br:8080/bimserver/apps/bimsurfer3/"));
    } else {
      // Return a default
      console.log(document.location);
      return "http://localhost:8080/bimserver";
    }
  }
}


import {BimServerClient} from "http://www.nomads.usp.br:8080/bimserver/apps/bimsurfer3/deps/bimserverjsapi/bimserverclient.js"
import {BimServerViewer} from "http://www.nomads.usp.br:8080/bimserver/apps/bimsurfer3/viewer/bimserverviewer.js"

/*
 * This class is where the minimal demo starts. This is intended as an example you can copy-and-paste to start integrating the viewer in your own application.
 */

export class Minimal {

  constructor() {
        
    // You need to change these to something that makes sense
    this.demoSettings = {
      
      // Address of your BIMserver
      //bimServerAddress: Address.getApiAddress(),
      bimServerAddress: "http://www.nomads.usp.br:8080/bimserver/",
      // Login credentials of your BIMserver, obviously you'd never include these for production applications
      bimServerLogin: {
        username: "platnomads@gmail.com",
        password: "@bimserver"
      },
      // Project ID of the project you want to load the latest revision from
      poid: 655361,
      // The settings for the viewer
      viewerSettings: {
        reportProgress: true,
        autoResize: true,
       
              
        viewerBasePath: "http://www.nomads.usp.br:8080/bimserver/apps/bimsurfer3/"
        // Not putting anything here will just use the default settings
      
      }
    };

  }

  start() {
    // Connect to a BIMserver
    this.api = new BimServerClient(this.demoSettings.bimServerAddress);
    // Initialize the API
    this.api.init(() => {
      // Login
      this.api.login(this.demoSettings.bimServerLogin.username, this.demoSettings.bimServerLogin.password, () => {
        // Get the project details
        this.api.call("ServiceInterface", "getProjectByPoid", {
          poid: this.demoSettings.poid
        }, (project) => {
          // Select what canvas to bind the viewer to
          var canvas = document.getElementById("canvas");
          devicePixelRatio=1;
          

          // Create a new BimServerViewer
          this.bimServerViewer = new BimServerViewer(this.api, this.demoSettings.viewerSettings, canvas, canvas.width, canvas.height);
            // Autoresize automatically resizes the viewer to the full width/height of the screen
   
   

          // Load the model
          this.bimServerViewer.loadModel(project);
        }, function(error) {
          console.error(error.message);
        });
      }, function() {
        console.error("Error logging-in, probably wrong username/password");
      });
    });
  }
}


new Minimal().start();
</script>
<?php;
}
 else 
 {
    // webgl not supported. Loads a gallery instead;
  ?>
<div class="fotorama"
  data-nav=false
  data-width="450"
  data-height="350"
  data-allowfullscreen="true">
  <img src="images/1/01_01.png">
  <img src="images/1/01_02.png">
  <img src="images/1/01_03.png">
   

</div>
<?php;
}
?>
          
 
	</div>
	 
</div>


<!--rodapé-->
<?php include 'footer_internal_main.php' ?>

</html>
</body>