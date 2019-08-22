<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link  href="fotorama/fotorama.css" rel="stylesheet">
<script src="fotorama/fotorama.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pîrâmides</title>

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
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">


<!--cabeçalho-->



<div class="header-div7">
  <?php include 'header_logo.php' ?>

  <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
  <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
     <div class="header-icons-left"> <a href="gallery1.php"><img src="images/circulo s.png"  width="48"  align="right" /></a></div>
        <div class="header-icons-left"> <a href="gallery2.php"><img src="images/circulo e.png"  width="48"  align="right" /></a></div> 
   <div class="header-icons-left"><a href="maps.php"><img src="images/view-locations.png"  width="50"  align="left" /></a></div>
   <div class="header-icons-left"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
   <div class="header-icons-text"><br>Pirâmides</div>


<div class="header-icons-right"><img src="images/quadrado triangulos.png" width="50px" title="triângulos" align="left"></a></div>
   <div class="header-icons-right"><a href="main2.php"><img src="images/quadrado voronoi.png" width="50px" title="voronoi" align="right" style="opacity:0.2"></a></div>
   <div class="header-icons-right"><a href="main3.php"><img src="images/quadrado quadrados.png" width="50" title="quadrados" align="right" style="opacity:0.2"></a></div>
 </div>

	

</div>
	


	
	<!--conteúdo-->
<div class="versions-div-grid">


 
	<div class="versions-elements-left">
     
    <?php
      session_start();
      $_SESSION['project_id']=2;
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=1;
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
          //selects discussion topics based on versions
      $query = mysql_query("SELECT id_discussion, user_name, relation, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 1 AND project_id = 3"); // SQL Query
        while($row = mysql_fetch_array($query))
        {
        ?>
        <ul id="discussions">
        <li>
        <?php
        //convert sql date_time to desired format. Include  %H:%M:%S at strftime to display the hour
        setlocale(LC_ALL, 'pt_BR.UTF-8','ptb_ptb');
        $time = strtotime($row['date_time']);
        $date_time_discussion = strftime("%d %b, %Y", $time);

        //shows discussions
         echo "{$row['user_name']} | {$date_time_discussion}"?>  

    	 | <span class="caret"></span><br>
    	 <?php
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
                  <button class="button" type="submit" name="submit" id="commentary"><img src="images/arrow_right.png"></button> <br/>
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
<!-- Verify if user is logged; if not, disables the posting area-->
<?php
if(isset($_SESSION['loggedin']))
{
  ?>
<form name="discussion" action="forum/post_comment.php" method="POST">
    <span id=discbox>
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="dê sua opinião sobre o Pirâmides (máximo de 200 caracteres)"></textarea>
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
	
 <div class="versions-elements-center"> 
  <?php
  //Reads cookie from project.php. This cookie stays persistent through versions.
  $webgl = $_COOKIE['webgl'];
  if ($webgl == 1) 
  {
  // WebGL supported. Loads interactive 3D model.
  ?>    
 <div id="viewer" class="versions-elements-center" style="position: relative;">
  
                 
    <canvas id="canvas" style="width:450px; height:350px; border:2px solid #C0C0C0; position: absolute; left: 0; top: 0; z-index: 1; opacity:0.90"></canvas>
    <canvas id="2dcanvas" style="width:450px; height:350px; border:2px solid #C0C0C0;position: absolute; left: 0; top: 0; z-index: 0;"></canvas>
        <script type="text/javascript">
          var c = document.getElementById("2dcanvas");
          var gl = c.getContext("2d");
          gl.fillStyle = "black";
          gl.fillRect(0, 125, 500, 28);
          gl.fillRect(270, 0, 40, 300)
        </script>
        
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
      poid: 720897,
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
  <img src="images/1/piramide_fallback.png">
   

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