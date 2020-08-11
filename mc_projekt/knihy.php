<?php

require('classes/Database.class.php');
require('classes/Knihy.class.php');


$allKdb = Knihy::LoadKnihy();
$allAutor = Knihy::LoadAutor();

?>
<!doctype html>
<html lang="en">
    <head>
        <title>KDB</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
        <link href='http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="js/sort.js"></script> 
     
   
    </head>
    <body>
            <script type="text/javascript">
            /* 
            Willmaster Table Sort
            Version 1.1
            August 17, 2016
            Updated GetDateSortingKey() to correctly sort two-digit months and days numbers with leading 0.
            Version 1.0, July 3, 2011

            Will Bontrager
            https://www.willmaster.com/
            Copyright 2011,2016 Will Bontrager Software, LLC

            This software is provided "AS IS," without 
            any warranty of any kind, without even any 
            implied warranty such as merchantability 
            or fitness for a particular purpose.
            Will Bontrager Software, LLC grants 
            you a royalty free license to use or 
            modify this software provided this 
            notice appears on all copies. 
            */
            //
            // One placed to customize - The id value of the table tag.

            var TableIDvalue = "indextable";

            //
            //////////////////////////////////////
            var TableLastSortedColumn = -1;
            function SortTable() {
            var sortColumn = parseInt(arguments[0]);
            var type = arguments.length > 1 ? arguments[1] : 'T';
            var dateformat = arguments.length > 2 ? arguments[2] : '';
            var table = document.getElementById(TableIDvalue);
            var tbody = table.getElementsByTagName("tbody")[0];
            var rows = tbody.getElementsByTagName("tr");
            var arrayOfRows = new Array();
            type = type.toUpperCase();
            dateformat = dateformat.toLowerCase();
            for(var i=0, len=rows.length; i<len; i++) {
                arrayOfRows[i] = new Object;
                arrayOfRows[i].oldIndex = i;
                var celltext = rows[i].getElementsByTagName("td")[sortColumn].innerHTML.replace(/<[^>]*>/g,"");
                if( type=='D' ) { arrayOfRows[i].value = GetDateSortingKey(dateformat,celltext); }
                else {
                    var re = type=="N" ? /[^\.\-\+\d]/g : /[^a-zA-Z0-9]/g;
                    arrayOfRows[i].value = celltext.replace(re,"").substr(0,25).toLowerCase();
                    }
                }
            if (sortColumn == TableLastSortedColumn) { arrayOfRows.reverse(); }
            else {
                TableLastSortedColumn = sortColumn;
                switch(type) {
                    case "N" : arrayOfRows.sort(CompareRowOfNumbers); break;
                    case "D" : arrayOfRows.sort(CompareRowOfNumbers); break;
                    default  : arrayOfRows.sort(CompareRowOfText);
                    }
                }
            var newTableBody = document.createElement("tbody");
            for(var i=0, len=arrayOfRows.length; i<len; i++) {
                newTableBody.appendChild(rows[arrayOfRows[i].oldIndex].cloneNode(true));
                }
            table.replaceChild(newTableBody,tbody);
            } // function SortTable()

            function CompareRowOfText(a,b) {
            var aval = a.value;
            var bval = b.value;
            return( aval == bval ? 0 : (aval > bval ? 1 : -1) );
            } // function CompareRowOfText()

            function CompareRowOfNumbers(a,b) {
            var aval = /\d/.test(a.value) ? parseFloat(a.value) : 0;
            var bval = /\d/.test(b.value) ? parseFloat(b.value) : 0;
            return( aval == bval ? 0 : (aval > bval ? 1 : -1) );
            } // function CompareRowOfNumbers()

            function GetDateSortingKey(format,text) {
            if( format.length < 1 ) { return ""; }
            format = format.toLowerCase();
            text = text.toLowerCase();
            text = text.replace(/^[^a-z0-9]*/,"");
            text = text.replace(/[^a-z0-9]*$/,"");
            if( text.length < 1 ) { return ""; }
            text = text.replace(/[^a-z0-9]+/g,",");
            var date = text.split(",");
            if( date.length < 3 ) { return ""; }
            var d=0, m=0, y=0;
            for( var i=0; i<3; i++ ) {
                var ts = format.substr(i,1);
                if( ts == "d" ) { d = date[i]; }
                else if( ts == "m" ) { m = date[i]; }
                else if( ts == "y" ) { y = date[i]; }
                }
            d = d.replace(/^0/,"");
            if( d < 10 ) { d = "0" + d; }
            if( /[a-z]/.test(m) ) {
                m = m.substr(0,3);
                switch(m) {
                    case "jan" : m = String(1); break;
                    case "feb" : m = String(2); break;
                    case "mar" : m = String(3); break;
                    case "apr" : m = String(4); break;
                    case "may" : m = String(5); break;
                    case "jun" : m = String(6); break;
                    case "jul" : m = String(7); break;
                    case "aug" : m = String(8); break;
                    case "sep" : m = String(9); break;
                    case "oct" : m = String(10); break;
                    case "nov" : m = String(11); break;
                    case "dec" : m = String(12); break;
                    default    : m = String(0);
                    }
                }
            m = m.replace(/^0/,"");
            if( m < 10 ) { m = "0" + m; }
            y = parseInt(y);
            if( y < 100 ) { y = parseInt(y) + 2000; }
            return "" + String(y) + "" + String(m) + "" + String(d) + "";
            } // function GetDateSortingKey()
            </script>

        <header id="vrchol">        
            <a href="index.php"><img src="images/icones/book.png" width="100" height="80"/></a>
            <a href="index.php" id="nazevStranky">KnižníDB</a>
            <span id="menuNadpis">KdbMenu</span> 
            <nav>
                <ul id="samotneMenu">
                    <li><a href="knihy.php" class="posunoutDolu">Knihy</a></li>
                    <li><a href="autori.php" class="posunoutDolu">Autoři</a></li>
                </ul>
            </nav>
            <div class="dokoncitObtekani"></div>
        </header>      

        <h2>Přidat knihu (autor musí existovat)</h2>
        <div class="dokoncitObtekani"></div>

        <form action="process_k.php" method="post">
            <input type="hidden" name="action" value="insert_k">

            <div class="form-group">
            <label for="nazev">Název</label>
            <input type="text"
                class="form-control" name="nazev" id="nazev" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
            <label for="jazyk">Jazyk</label>
            <input type="text"
                class="form-control" name="jazyk" id="jazyk" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
            <label for="pocet_stran">Počet stran</label>
            <input type="number"
                class="form-control" name="pocet_stran" id="pocet_stran" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
            <label for="rok_vydani">Rok vydaní</label>
            <input type="number"
                class="form-control" name="rok_vydani" id="rok_vydani" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
            <label for="zanr">Žanr</label>
            <input type="text"
                class="form-control" name="zanr" id="zanr" aria-describedby="helpId" placeholder="">
            </div>


            <div class="form-group">
            <label for="id_autora">Autor</label>
            <select name="id_autora" id="id_autora">
            <option value="0">Autor</option>
            <?php foreach($allAutor as $Kdba){ ?>
                <option value="<?php echo $Kdba->id_autora; ?>"><?php echo $Kdba->jmeno; ?> <?php echo $Kdba->prijmeni; ?> <?php echo $Kdba->rok_narozeni; ?> </option>
            <?php } ?>
            </select>
            </div>

            <button type="submit" class="btn btn-primary">Uložit</button>
        </form> 

            <h2>Seznam knih</h2>
            <div class="dokoncitObtekani"></div>
        </div>

        <div class="w3-container">
        <table id="indextable" class="w3-table-all w3-card-4">
        <thead>
            <tr><th><a href="javascript:SortTable(0,'T');">Název</a></th><th><a href="javascript:SortTable(1,'T');">Jazyk</a></th><th><a href="javascript:SortTable(2,'N');">Počet stran</a></th><th><a href="javascript:SortTable(3,'N');">Rok vydání</a></th></tr>
        </thead>
        </tbody>    
            <?php foreach($allKdb as $Kdb){ ?>
            <tr><td><?php echo $Kdb->nazev; ?></td><td><?php echo $Kdb->jazyk; ?></td><td><?php echo $Kdb->pocet_stran; ?></td><td><?php echo $Kdb->rok_vydani; ?>
            <form class="float-right" action="process_k.php" method="post">
            <input type="hidden" name="action" value="delete_k">
            <input type="hidden" name="id_kniha" value="<?php echo $Kdb->id_kniha; ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>            
            </td></tr>
            <?php } ?>
        </tbody>
        </table> 

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>