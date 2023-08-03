<?php
include_once __DIR__.'/../Entity/BookManager.php';
class BookController {

    private $bookManager;

    function __construct()
    {
        $this->bookManager=new BookManager();
        
    }

    function getBooks(){
        // get data from Model 
        $books=$this->bookManager->getEntity();
        // display template
        include_once __DIR__.'/../../templates/books.php';
    }

    function getBook(){
        // get paramater ID from URL
        $id=$_GET['id'];
        $book=$this->bookManager->getOneEntity($id);
        include_once __DIR__.'/../../templates/book.php';


        
    }



    function updateBook(){
        
    }

    function deleteBook(){
        
    }
    function insertBook(){
        // display form  to create a book
        include __DIR__.'/../../templates/form_book.php';
        
    }
    function saveBook(){


        // 1 get data post
        $title=$_POST['nom_livre'];
        // 2 Object book with data
        $book =new Book();
        $book->setTitre($title);
        // example
        $book->setCategorie_id(2);
        // 3. Model
        $bookManager=new BookManager();
        $bookManager->saveEntity($book);

        

    }

}