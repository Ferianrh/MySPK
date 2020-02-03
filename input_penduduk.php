<?php
    include_once('layout/view.php');

    $v = new View();

    $v->set_content('menu_contents/form.php');
    if(isset($_GET["page"])) {
        $PAGE = $_GET["page"];
      }
      else {
        $PAGE = "home";
      }
      $v->render_all();
?>