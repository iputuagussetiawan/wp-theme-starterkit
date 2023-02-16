<?php
$cardeightDate = get_the_date('F d, Y');
if (isset($args['card-eight-image'])) {
    $cardeightImage = $args['card-eight-image'];
} else {
    $cardeightImage = '';
}
if (isset($args['card-eight-title'])) {
    $cardeightTitle = $args['card-eight-title'];
} else {
    $cardeightTitle = '';
}
if (isset($args['card-eight-description'])) {
    $cardeightDescription = $args['card-eight-description'];
} else {
    $cardeightDescription = '';
}

if (isset($args['card-eight-logo'])) {
    $cardEightLogo = $args['card-eight-logo'];
} else {
    $cardEightLogo = '';
}


?>
<div class="card-eight">
    <?php
    if ($cardEightLogo) :
    ?>
        <div class="card-eight__logo-container">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <img class="card-eight__logo" src="<?php echo $image[0];  ?>" alt="Valtatech Logo">
        </div>
    <?php
    endif;
    ?>
    <a href="<?php the_permalink() ?>" class="card-eight__image-container">
        <img src="<?php echo  $cardeightImage ?>" alt="<?php echo $cardeightTitle; ?>" class="card-eight__image">
    </a>
    <div class="card-eight__info-container">
        <p class="card-eight__date"><?php echo $cardeightDate; ?></p>
        <a href="<?php the_permalink() ?>">
            <h4 class="card-eight__title"><?php echo $cardeightTitle ?></h4>
        </a>
        <?php
        if ($cardeightDescription) :
        ?>
            <div class="card-eight__content">
                <?php echo $cardeightDescription ?>
            </div>
        <?php
        endif;
        ?>
        <a href="<?php the_permalink() ?>" class="card-eight__link"><?php echo pll__('Read more'); ?>
            <iconify-icon class="card-eight__icon" icon="ion:arrow-forward"></iconify-icon>
        </a>
    </div>
</div>