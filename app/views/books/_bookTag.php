<?php
/**@var array $tags */
?>

        <div class="tag-cloud">
            <?php foreach ($tags as $tag) :?>
            <a class="text-gray-300 hover:text-white text-sm" href="#"><?php echo $tag->name;?></a>
            <?php endforeach; ?>
        </div>