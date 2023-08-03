<h1>All books</h1>

<?php foreach ( $books as $one_book) { ?>

    <hr>
    <?php echo $one_book->getId();  ?>
    <a href="index.php/book?id=<?=$one_book->getId()?>">
     Title : <?=$one_book->getTitre()?></a>
    - <a href="index.php/remove_book?id=<?=$one_book->getId()?>">
        Supprimer ce livre ! 
    </a>


<?php } ?>