<?php
include_once __DIR__.'/../Entity/Book.php';
define('DSN', 'mysql:host=localhost;dbname=bibli');
// on doit definir le nom d'utilisateur.
// on le stock dans la variable constant USER
define('USER', 'root');
// on doit definir un mot de passe
// on le stock dans la variable constant PASS
define('PASS', '');

abstract class Model {
    protected $pdo;
    protected $table;

    function __construct()
    {
        $this->pdo = new \PDO(DSN, USER, PASS);
    }
    // return all books (Array)
    function getEntity(){ 

        // creer un objet permettant une connexion à la B.D. 
         $query = "SELECT * FROM $this->table";
        // L'instance PDO (objet) utilise une méthode (fonction spécifique à cet objet)
        // permettant d'éxecuter la requête.
        // on stocke le resultat dans la variable statement
        $statement = $this->pdo->query($query);
        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $object = $statement->fetchAll(PDO::FETCH_CLASS,"Book");
        //     $livre = $statement->fetch(PDO::FETCH_ASSOC);

        return $object;
    }


    function getOneEntity($id){
    
        // creer un objet permettant une connexion à la B.D. 
        // 
        $query="SELECT * FROM $this->table WHERE id=:monidprotege";

        // on va preparer la requete
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':monidprotege', $id, \PDO::PARAM_INT);
        
        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $statement->execute();
        $object = $statement->setFetchMode(PDO::FETCH_CLASS,"Book");
        $object=  $statement->fetch();

        return $object;
    }
    function removeEntity($id){
        

        $query="DELETE FROM $this->table WHERE id=:monidprotege";

        // on va preparer la requete
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':monidprotege', $id, \PDO::PARAM_INT);

        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $statement->execute();
        $object = $statement->fetch(PDO::FETCH_ASSOC);
    }

 
    
    function saveEntity(  Book $book      ){
       
        $query="INSERT INTO $this->table (titre) VALUES (:titre)";

        // on va preparer la requete
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':titre', $book->getTitre());
        
        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $statement->execute();
        
 
    }

}