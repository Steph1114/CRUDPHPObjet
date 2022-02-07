<?php
    include ('head.php');


    //Loc = vue souhaiter de l'user
    $loc = filter_input(INPUT_GET, "loc", FILTER_SANITIZE_STRING);

    switch ($loc) {

        case 'index':
          include("view/V_index.php");
          break;

        case 'add':
          include("view/V_add.php");
          break;

        case 'read':
          // include("../controller/C_read.php");
          include("view/V_read.php");
          break;

        case 'update':
          include("view/V_update.php");
          break;

        case 'delete':
          include("../controller/C_delete.php");
          include("view/V_delete.php");
          break;

        default;
          include("view/V_index.php");
          break;              
    }
