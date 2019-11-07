<?php

include_once("layout/View.php");

$v = new View();

if(isset($_GET["page"])) {
	$PAGE = $_GET["page"];
}
else {
	$PAGE = "home";
}

$v->render_all();
?>  
      <!-- bekas letak navbar-->
     
      <!-- bekas letak sidebar-->
     
      <!-- bekas letak header-->

      <!-- bekas letak content-->      
          
      <!-- bekas letak footer-->  
    
      <!-- bekas letak plugin js-->