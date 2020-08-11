<?php
 ini_set('display_errors', 1);
class Kniha {

    //objekt DB pripojeni
    protected static $Knihy;

    //ORM promenne
    protected $id_kniha;
    protected $nazev;
    protected $jazyk;
    protected $pocet_stran;
    protected $rok_vydani;
    protected $zanr;



    //contruktor - pripojeni k DB
    public function __construct(){

        //ziska objekt pro pripojeni k DB
        self::$Knihy = Database::getInstance();

    }


    public function Deletek() {
        //maze instanci
        $stmt = self::$Knihy->prepare('DELETE FROM kdb_knihy WHERE id_kniha=:id_kniha');
        $stmt->execute(array(':id_kniha'=>$this->id_kniha));

    }


        public function Save_k(){        
    

    
            $stmt = self::$Knihy->prepare('INSERT INTO kdb_knihy (nazev, jazyk, pocet_stran, rok_vydani, zanr) VALUES (:nazev, :jazyk, :pocet_stran, :rok_vydani, :zanr)');
            $stmt->execute(array(
                ':nazev' => $this->nazev,
                ':jazyk' => $this->jazyk,
                ':pocet_stran' => $this->pocet_stran,
                ':rok_vydani' => $this->rok_vydani,
                ':zanr' => $this->zanr,
            ));
        

        return self::$Knihy->lastInsertId();



}
   
    //getter - ziskani vlastnosti objektu
    public function __get($strName){

        switch ($strName) {
            case 'id_kniha':
                return $this->id_kniha;
                break;
    
            case 'nazev_kniha':
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
                
        }
    }

        //setter
        public function __set($strName, $mixValue){

            switch ($strName) {
                case 'id_kniha':
                    $this->id_kniha = $mixValue;
                    break;
        
                case 'nazev_kniha':
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

            }
        }
}
