<?php
    require('classes/Database.class.php');
    require('classes/Knihy.class.php');

    // insert into DB
    if(isset($_POST['action'])){
        // process actions
        switch($_POST['action']){
            case 'insert_a':
                // insert new record to DB

                // create new empty Contact object
                $Knihy = new Knihy();
                // fullfill properties from Form Data
                $Knihy->jmeno = $_POST['jmeno'];
                $Knihy->prijmeni = $_POST['prijmeni'];
                $Knihy->rok_narozeni = $_POST['rok_narozeni'];
                // save to DB
                $Knihy->Save_a();
                break;

            case 'delete_a':
                // load Contact by ID
                $toDelete = Knihy::Loada($_POST['id_autora']);
                // delete this Contact
                $toDelete->Deletea();
                break;
        
        }
    }
    // redir to home page
    header('location: autori.php');

?>