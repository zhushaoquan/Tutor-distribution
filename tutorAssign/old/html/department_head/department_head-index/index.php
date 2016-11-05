<?php
      if(!isset($_GET["year"]))
      {
        include'year.html.php';
      }
      else if(isset($_GET["year"])&&!isset($_GET["table_name"]))
        {
          include'table_name.html.php';
          //echo $_GET["table_name"];
          //echo $_GET["year"];
        }
      else if (isset($_GET["year"])&&isset($_GET["table_name"])) {
        
          include'table_overview.html.php';
        }
       
?>