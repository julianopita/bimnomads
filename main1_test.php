
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Platnomads</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="description" content="Platnomads" />
 <!--<script src="forum/like_dislike.js"></script>-->
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">


<!--cabeçalho-->
	
<div class="header-versions">
  <div class="versions_left"><img src="images/versao-1.jpg" width="50px" title="versão 1" align="left"></div>
	<div class="versions_left">VERSÃO1<br>versão com praça externa, maior área verde e espaços de convivência</div>
<div class="versions_right"><a href="main2.php"><img src="images/versao-2-100x100.png" width="50px" title="versão 2" align="right"></a></div>
<div class="versions_right"><a href="main3.php"><img src="images/versao-3.1-100x100.png" width="50" title="versão 3" align="right"></a></div>

</div>
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
	
	
	<!--conteúdo-->
<div class="versions-div-grid">
	<div class="versions-elements-left">
<!--discussion frame. In future versions migrate the php and jscript to separate files-->
    

    <?php
      session_start();
      unset($_SESSION['loggedin']);
$_SESSION['loggedin']="juliano";
      $user_id = $_SESSION['loggedin'];
      unset($GLOBALS['version']);
      $_SESSION['version']=1;
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
      $query= mysql_query("SELECT id_discussion, user_name, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 1"); // SQL Query

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
        ?>
        
<?php

         echo "$id_discussion {$row['id_discussion']} | {$date_time_discussion} | "?>
        
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
       			
       			|  <i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000000" onclick="insert_like_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i><?php echo $like['likes']; ?>
         		|  <i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000000" onclick="insert_dislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $dislike['dislikes'];   			
       	   		}
       			else
       			{if ($testlikes['testlikes'] == 1 AND $testdislikes['testdislikes'] == 0)
       				{ ?>
       				| <i <?php $id_likedislike=$row['id_discussion'];?> id="unlike<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #000fff" onclick="insert_unlike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i> <?php echo $like['likes']; ?>
         			| <i <?php $id_likedislike=$row['id_discussion'];?> id="dislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #C0C0C0"></i><?php echo $dislike['dislikes']; ?>
					<?php
         			}
         			else
         			{ ?>
         			| <i <?php $id_likedislike=$row['id_discussion'];?> id="like<?php echo $id_likedislike; ?>" class="far fa-smile" style="color: #C0C0C0"></i> <?php echo $like['likes']; ?>
       				| <i <?php $id_likedislike=$row['id_discussion'];?> id="undislike<?php echo $id_likedislike; ?>" class="far fa-frown" style="color: #000fff" onclick="insert_undislike_discussion(<?php echo "$id_discussion {$row['id_discussion']}";?>)"></i><?php echo $dislike['dislikes']; ?> 
         			
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

    	 <?php
       
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
     ?><li><?php echo "<br>{$comments['user_name']} | {$date_time_comments} " ?>| <input type="image" src="like.png" onclick="insert_like_comment();" id="like_button"> | <input type="image" src="dislike.png" onclick="insert_dislike_comment();" id="dislike_button"><br> 

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
</script>
</div>

<!--like dislike system-->



  





<!--BIMserver frame-->
<div class="versions-elements-center">
    <canvas id="canvas" ></canvas>
<script src="gl-matrix.js"></script>
<script type="module">
   //* This class will return the API address for a BIMserver Client
 

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
      poid: 196609,
      // The settings for the viewer
      viewerSettings: {
      
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
          
          // Create a new BimServerViewer
          this.bimServerViewer = new BimServerViewer(this.api, this.demoSettings.viewerSettings, canvas, window.innerWidth, window.innerHeight);
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
	</div>
	<form action="post.php" method="POST">
	<div class="versions-elements-right">
		<button class="button" type="submit" name="version" id="version" value=1></button> 
	</div>
	
</div>

<!--post window-->
<div class="middle-div-index">
  <div class="arrow-left">
  <a href="main<?php echo $_SESSION['version'] ?>.php"><img src="images/arrow_left.png" align="left"/></a>
  </div>
  
  <form action="publish.php" method="POST">
    <span class="comment">
       <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="inicie aqui sua conversa (máximo de 200 caracteres)"></textarea><br/>
      </span>
      <div class="arrow-right-button">
    <button class="button" type="submit" name="submit" id="submit"></button> 
          
    
  </div>
    </form>
</div>


<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>
</body>
