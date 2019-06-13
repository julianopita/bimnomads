		<?php
      session_start();
      unset($GLOBALS['version']);
     // $_SESSION["poid"] = "131073";
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
    

        $id = mysql_query("SELECT id_discussion FROM discussion");
       	while($id_discussion = mysql_fetch_array($id))
        {






         echo $id_discussion['id_discussion']; 
        $query = mysql_query("SELECT id_discussion, user_name, date_time, discussion, likes, dislikes FROM discussion WHERE tag_version = 1"); // SQL Query
        ($row = mysql_fetch_array($query));
            
         echo "{$row['user_name']} | {$row['date_time']} | {$row['likes']} | {$row['dislikes']}";
         echo "{$row['discussion']}<br>";
      
      






        ?>
        <p></p>
        <?php






              $di = mysql_query("SELECT discussion FROM comments");
              while($di_discussion = mysql_fetch_array($di))  	 
        	     
              if ($di_discussion['discussion']==$id_discussion['id_discussion'])
              {    
              $query_commentary = mysql_query("SELECT user_name, date_time, commentary, likes, dislikes, discussion FROM comments"); // SQL Query
                       $row_commentary = mysql_fetch_array($query_commentary);
                     
                    echo "{$row_commentary['user_name']} | {$row_commentary['date_time']} | {$row_commentary['likes']} | {$row_commentary['dislikes']} | {$row_commentary['id_discussion']}";
                    echo "{$row_commentary['commentary']}<br>";





                echo $di_discussion['discussion'];
             






             }
           else
           {
            echo "";
           }
           ?>
           <p></p>
        <?php

        }

        
       
               //     $query_commentary = mysql_query("SELECT user_name, date_time, commentary, likes, dislikes, discussion FROM comments"); // SQL Query
           //            while($row_commentary = mysql_fetch_array($query_commentary))
           //          { 
           //          echo "{$row_commentary['user_name']} | {$row_commentary['date_time']} | {$row_commentary['likes']} | {$row_commentary['dislikes']} | {$row_commentary['id_discussion']}";
         //            echo "{$row_commentary['commentary']}<br>";}}
       //    else
    //       {
   //         unset ($id_discussion);  }
   //         }
            
      //  } 
     //   }
      //   unset ($id_discussion);      
	      
        
        ?>
          <script>
  var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".commentary").classList.toggle("active");          
    this.classList.toggle("caret-down");
    <?php
            $query_commentary = mysql_query("SELECT user_name, date_time, commentary, likes, dislikes FROM comments WHERE id_discussion = '$id_discussion'"); // SQL Query
          while($row_commentary = mysql_fetch_array($query_commentary))
             { 
            echo "{$row_commentary['user_name']} | {$row_commentary['date_time']} | {$row_commentary['likes']} | {$row_commentary['dislikes']}";
            echo "{$row_commentary['discussion']}<br>";
            unset ($id_discussion);
            }
          //  WHERE id_discussion = '$id_discussion'
            ?>
  });
}
</script> 
     	
            
