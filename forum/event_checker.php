<?php

     session_start();
     $_SESSION['project_id']=2;
     $project_id = $_SESSION['project_id'];
     setlocale(LC_ALL, 'pt_BR.UTF-8','ptb_ptb');
     $today = date('Y-m-d');
         
        mysql_connect("localhost", "platnomads","@bimserver") or die(mysql_error()); //Connect to server
        mysql_select_db("platnomads") or die("Cannot connect to database"); //connect to database
     
        $query = mysql_query("SELECT * FROM events WHERE project_id = '$project_id'"); // SQL Query
        while($row = mysql_fetch_array($query))
          {
          $event_id = $row['id_event'];
         	$event_start = date('Y-m-d' , strtotime($row['start_date']));
        	$event_end = date('Y-m-d' , strtotime($row['end_date']));
          $event_description = $row['description'];
                  
       	  if ($event_start <= $today && $event_end >= $today)
          	{
            $_SESSION['allow_posting'] = $row['allow_posting'];
            }
          }
//?>
	


