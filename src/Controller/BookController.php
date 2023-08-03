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
        $this->bookManager->getBooksEntity();
        // display template
        include_once __DIR__.'/../../templates/books.php';
    }

    function getBook(){
        // get paramater ID from URL
        $id=$_GET['id'];
        $this->bookManager->getBookEntity($id);
        include_once __DIR__.'/../../templates/book.php';


        
    }

    function insertBook(){
        
    }

    function updateBook(){
        
    }

    function deleteBook(){
        
    }

}