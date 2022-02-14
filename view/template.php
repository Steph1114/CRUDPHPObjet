<?php
    include_once('controller/C_User.php');


    include ('head.php');


    //Loc = vue souhaitee de l'user
    $loc = filter_input(INPUT_GET, "loc", FILTER_SANITIZE_STRING);

    $c_user = new C_User();

    switch ($loc) {

        case 'index':
          include("view/V_index.php");
          break;

        case 'add':
          include("view/V_add.php");
          break;

        case 'read':
          include("view/V_read.php");
          break;

        case 'update':
          include("view/V_update.php");
          break;

        case 'delete':
          include("view/V_delete.php");
          break;

        default;
          include("view/V_index.php");
          break;              
    }
