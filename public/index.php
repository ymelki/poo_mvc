<?php

// routeur
// $_SERVER['PATH_INFO'] => localhost/path
// CRUD BOOK
if ($_SERVER['PATH_INFO']=="/books"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->getBooks();
}

if ($_SERVER['PATH_INFO']=="/book"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "book";
    $bookcontroller=new BookController();
    $bookcontroller->getBook();
}

if ($_SERVER['PATH_INFO']=="/savebook"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->insertBook();
}

if ($_SERVER['PATH_INFO']=="/updatebook"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->updateBook();
}

if ($_SERVER['PATH_INFO']=="/deletebook"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->deleteBook();
}


if ($_SERVER['PATH_INFO']=="/insertbook"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->insertBook();
}
if ($_SERVER['PATH_INFO']=="/savebook"){
    include __DIR__.'/../src/Controller/BookController.php';
    echo "books";
    $bookcontroller=new BookController();
    $bookcontroller->saveBook();
}

