<h1>book</h1>


    <hr>
    <?php echo $book->getId();  ?>
    <a href="index.php/book?id=<?=$book->getId()?>">
     Title : <?=$book->getTitre()?></a>
    - <a href="index.php/remove_book?id=<?=$book->getId()?>">
        Supprimer ce livre ! 
    </a>


