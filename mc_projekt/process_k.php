<?php
    ini_set('display_errors', 1);
    require('classes/Database.class.php');
    require('classes/Knihy.class.php');

    // insert into DB
    if(isset($_POST['action'])){
        // process actions
        switch($_POST['action']){
            case 'insert_k':
                // insert new record to DB

                // create new empty Contact object
                $Knihy = new Knihy();
                // fullfill properties from Form Data
                $Knihy->nazev = $_POST['nazev'];
                $Knihy->jazyk = $_POST['jazyk'];
                $Knihy->pocet_stran = $_POST['pocet_stran'];
                $Knihy->rok_vydani = $_POST['rok_vydani'];
                $Knihy->zanr = $_POST['zanr'];   
                $Knihy->id_autora = $_POST['id_autora'];            
                // save to DB
                $Knihy->Save_k();
                break;

            case 'delete_k':
                // load Contact by ID
                $toDelete = Knihy::Loadk($_POST['id_kniha']);
                // delete this Contact
                $toDelete->Deletek();
                break;
        }
    }
    // redir to home page
    header('location: knihy.php');

?>