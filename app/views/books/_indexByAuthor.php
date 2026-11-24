<?php
/** @var \App\Models\Book $book 
  * @var \App\Models\Author $author
*/ 
?>
   <?php foreach($author->books as $book):?>
    <li>
        <a
            href="books/<?php echo $book->id?>/<?php echo \Core\Helpers::slugify($book->title);?>"
            class="hover:text-red-500 underline font-medium"><?php echo $book->title?></a>
    </li>
    <?php endforeach;?>