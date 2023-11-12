<?php

abstract class Model{
    private static $_bdd;

    //Instancie la connexion à la BDD
    private static function setBdd(){
        self::$_bdd = new PDO(); //<- mettre le lien de la BDD dans les parenthèses ici
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Récupère la connexion à la BDD
    protected function getBdd(){
        if(self::$_bdd == null)
        $this->setBdd();
    return self::$_bdd;
    }

    protected function getAll($table, $obj){

        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM' .$table. 'ORDER BY d desc');
        $req->execute();
        while($data=$req->fetch(PDO::FETCH_ASSOC)){

            $var[] =new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}