<?php

/**
 * Front Page template
 * 
 * @package Timedoor
 */
?>
<?php
get_header();
?>
<main>
    <?php
    the_title();
    the_content();
    ?>
</main>
<?php get_footer(); ?>