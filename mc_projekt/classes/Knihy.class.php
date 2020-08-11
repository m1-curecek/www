<?php
 ini_set('display_errors', 1);
class Knihy {

    //objekt DB pripojeni
    protected static $Knihy;

    //ORM promenne
    protected $id_kniha;
    protected $nazev;
    protected $jazyk;
    protected $pocet_stran;
    protected $rok_vydani;
    protected $zanr;
    protected $id_autora;
    protected $jmeno;
    protected $prijmeni;
    protected $rok_narozeni;
    protected $id_a;



    //contruktor - pripojeni k DB
    public function __construct(){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

    }

    //LoadAll - nacte vsechny radky z tabulky
    public static function LoadKnihy(){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

        //pole pro objekty
        $arrObjects = array();

        $stmt = self::$Knihy->query('SELECT * FROM `kdb_knihy`');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');

        while($Knihy = $stmt->fetch()){

            array_push($arrObjects, $Knihy);
        }

        return $arrObjects;
    }

        //LoadAll - nacte vsechny radky z tabulky
        public static function LoadAutor(){

            //ziska objekt pro pripojeni k DB
            self::$Knihy = Database::getInstance();
    
            //pole pro objekty
            $arrObjects = array();
    
            $stmt = self::$Knihy->query('SELECT * FROM `kdb_autor`');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');
    
            while($Knihy = $stmt->fetch()){
    
                array_push($arrObjects, $Knihy);
            }
    
            return $arrObjects;
        }

    //Load - nacte jeden radek z databaze
    public static function Loada($intId){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

        //statement - dotaz nad DB
        $stmt = self::$Knihy->prepare('SELECT * FROM kdb_autor WHERE id_autora = :id_autora');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');
        //provedeme pripraveny dotaz
        $stmt->execute(array(':id_autora'=>$intId));

        return  $stmt->fetch();
    }
        //Load - nacte jeden radek z databaze
        public static function Loadk($intId){

            //ziska objekt pro pripojeni k DB
            self::$Knihy = Database::getInstance();
    
            //statement - dotaz nad DB
            $stmt = self::$Knihy->prepare('SELECT * FROM kdb_knihy WHERE id_kniha = :id_kniha');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');
            //provedeme pripraveny dotaz
            $stmt->execute(array(':id_kniha'=>$intId));
    
            return  $stmt->fetch();
        }

    //LoadAll - nacte vsechny radky z tabulky
    public static function LoadZanry(){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

        //pole pro objekty
        $arrObjects = array();

        $stmt = self::$Knihy->query('SELECT zanr FROM `kdb_knihy` GROUP BY zanr');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');

        while($Knihy = $stmt->fetch()){

            array_push($arrObjects, $Knihy);
        }

        return $arrObjects;
    }
//Load last 5
    public static function LoadLast5(){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

        //pole pro objekty
        $arrObjects = array();

        $stmt = self::$Knihy->query('SELECT * FROM kdb_knihy INNER JOIN kdb_autor ON kdb_autor.id_autora=kdb_knihy.id_autora ORDER BY id_kniha DESC LIMIT 5');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');

        while($Knihy = $stmt->fetch()){

            array_push($arrObjects, $Knihy);
        }

        return $arrObjects;
    }
        //Load - nacte jeden radek z databaze
        public static function LoadLastK(){

            //ziska objekt pro pripojeni k DB
            self::$Knihy = Database::getInstance();
    
            //pole pro objekty
            $arrObjects = array();
    
            $stmt = self::$Knihy->query('SELECT * FROM kdb_knihy ORDER BY id_kniha DESC LIMIT 1');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Knihy');
    
            while($Knihy = $stmt->fetch()){
    
                array_push($arrObjects, $Knihy);
            }
    
            return $arrObjects;
        }

    public function Deletea() {
        //maze instanci
        $stmt = self::$Knihy->prepare('DELETE kdb_knihy, kdb_autor FROM kdb_knihy LEFT JOIN kdb_autor ON kdb_autor.id_autora = kdb_knihy.id_autora WHERE kdb_knihy.id_autora=:id_autora');
        $stmt->execute(array(':id_autora'=>$this->id_autora));

    }
    public function Deletek() {
        //maze instanci
        $stmt = self::$Knihy->prepare('DELETE FROM kdb_knihy WHERE id_kniha=:id_kniha');
        $stmt->execute(array(':id_kniha'=>$this->id_kniha));

    }

        //Save - ulozeni instance objektu do DB
    public function Save_a(){
            
    

    
                    $stmt = self::$Knihy->prepare('INSERT INTO kdb_autor (jmeno, prijmeni, rok_narozeni) VALUES (:jmeno,:prijmeni,:rok_narozeni)');
                    $stmt->execute(array(
                        ':jmeno' => $this->jmeno,
                        ':prijmeni' => $this->prijmeni,
                        ':rok_narozeni' => $this->rok_narozeni,
                    ));
                
    
                return self::$Knihy->lastInsertId();
    

    
        }

        public function Save_k(){        
    

    
            $stmt = self::$Knihy->prepare('INSERT INTO kdb_knihy (nazev, jazyk, pocet_stran, rok_vydani, zanr, id_autora) VALUES (:nazev, :jazyk, :pocet_stran, :rok_vydani, :zanr, :id_autora)');
            $stmt->execute(array(
                ':nazev' => $this->nazev,
                ':jazyk' => $this->jazyk,
                ':pocet_stran' => $this->pocet_stran,
                ':rok_vydani' => $this->rok_vydani,
                ':zanr' => $this->zanr,
                ':id_autora' => $this->id_autora,
            ));
        

        return self::$Knihy->lastInsertId();



}



   
    //getter - ziskani vlastnosti objektu
    public function __get($strName){

        switch ($strName) {
            case 'id_kniha':
                return $this->id_kniha;
                break;
    
            case 'nazev':
                return $this->nazev;
                break;

            case 'jazyk':
                return $this->jazyk;
                break;

            case 'pocet_stran':
                return $this->pocet_stran;
                break;
            
            case 'rok_vydani':
                return $this->rok_vydani;
                break;

            case 'zanr':
                return $this->zanr;
                break;
                
            case 'jmeno':
                return $this->jmeno;
                break;

            case 'prijmeni':
                return $this->prijmeni;
                break;  

            case 'rok_narozeni':
                    return $this->rok_narozeni;
                    break;                                 

            case 'id_autora':
                    return $this->id_autora;
                    break;

            case 'id_a':
                    return $this->id_a;
                    break;
        }
    }

        //setter
        public function __set($strName, $mixValue){

            switch ($strName) {
                case 'id_kniha':
                    $this->id_kniha = $mixValue;
                    break;
        
                case 'nazev':
                    $this->nazev = $mixValue;
                    break;
    
                case 'jazyk':
                    $this->jazyk = $mixValue;
                    break;
    
                case 'pocet_stran':
                    $this->pocet_stran = $mixValue;
                    break;
                
                case 'rok_vydani':
                    $this->rok_vydani = $mixValue;
                    break;
    
                case 'zanr':
                    $this->zanr = $mixValue;
                    break;
                    
                case 'jmeno':
                    $this->jmeno = $mixValue;
                    break;
    
                case 'prijmeni':
                    $this->prijmeni = $mixValue;
                    break;  
    
                case 'rok_narozeni':
                    $this->rok_narozeni = $mixValue;
                    break;                                 

                case 'id_autora':
                    $this->id_autora = $mixValue;
                    break;
                case 'id_a':
                    $this->id_a = $mixValue;
                    break;
            }
        }
}
