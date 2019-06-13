<?php
      session_start();
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("SELECT user_name, date_time, commentary, likes, dislikes FROM comments"); // SQL Query
               while($row = mysql_fetch_array($query))
?>
