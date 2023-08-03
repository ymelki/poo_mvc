<?php
include_once __DIR__.'/../Entity/Book.php';
define('DSN', 'mysql:host=localhost;dbname=bibli');
// on doit definir le nom d'utilisateur.
// on le stock dans la variable constant USER
define('USER', 'root');
// on doit definir un mot de passe
// on le stock dans la variable constant PASS
define('PASS', '');

class BookManager {
    private $pdo;

    function __construct()
    {
        $this->pdo = new \PDO(DSN, USER, PASS);
    }
    // return all books (Array)
    function getBooksEntity(){
        


        // creer un objet permettant une connexion à la B.D. 
        // 

        $query = "SELECT * FROM livre";
        // L'instance PDO (objet) utilise une méthode (fonction spécifique à cet objet)
        // permettant d'éxecuter la requête.
        // on stocke le resultat dans la variable statement
        $statement = $this->pdo->query($query);
        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $livres = $statement->fetchAll(PDO::FETCH_CLASS,"Book");
        //     $livre = $statement->fetch(PDO::FETCH_ASSOC);

        return $livres;
    }


    function getBookEntity($id){
    
        // creer un objet permettant une connexion à la B.D. 
        // 
        $query="SELECT * FROM livre WHERE id=:monidprotege";

        // on va preparer la requete
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':monidprotege', $id, \PDO::PARAM_INT);
        
        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $statement->execute();
        $livre = $statement->fetch(PDO::FETCH_CLASS,"Book");
    

        return $livre;
    }
    function removeBookEntity($id){
        

        $query="DELETE FROM livre WHERE id=:monidprotege";

        // on va preparer la requete
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':monidprotege', $id, \PDO::PARAM_INT);

        // On utilise statement qui a une méthode (sa propre fonction) permettant
        // de récupérer les données. On utilise le parametre PDO::FETCH_ASSOC
        // qui nous permet d'avoir un format de donnée sous forme de tableau
        // associatif
        $statement->execute();
        $unlivre = $statement->fetch(PDO::FETCH_ASSOC);
    }

 
    
    function saveBook(  Book $book      ){
       
        $query="INSERT INTO livre (titre) VALUES (:titre)";

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