<?php

/**
 * Footer template
 *
 * @package timedoor
 */
$footerLogo = get_field('footer_logo', 'company-setting');
$footerBookingImage = get_field('footer_image_booking', 'company-setting');
$footerBookingImageMobile = get_field('footer_image_booking_mobile', 'company-setting');
if ($footerLogo) :
    $urlFooterLogo = $footerLogo['url'];
    $altFooterLogo = $footerLogo['alt'];
else :
    $urlFooterLogo = get_template_directory_uri() . '/src/images/logo/valtatech-logo.png';
    $altFooterLogo = 'Valtatech';
endif;

if ($footerBookingImage) :
    $urlFooterBookingImage = $footerBookingImage['url'];
else :
    $urlFooterBookingImage = get_template_directory_uri() . '/src/images/blank-image.svg';
endif;

if ($footerBookingImageMobile) :
    $urlFooterBookingImageMobile = $footerBookingImageMobile['url'];
else :
    $urlfooterBookingImageMobile = get_template_directory_uri() . '/src/images/blank-image.svg';
endif;

$pageHomeID = get_field('home_link', 'page_link')->ID;
$pageHomeLink = get_permalink($pageHomeID);

$pageNewsID = get_field('news_link', 'page_link')->ID;
$newsLink = get_permalink($pageNewsID);

$pageCaseStudiesID = get_field('case_studies_link', 'page_link')->ID;
$caseStudiesLink = get_permalink($pageCaseStudiesID);

$pageTLID = get_field('case_thought_leadership_link', 'page_link')->ID;
$TLLink = get_permalink($pageTLID);

$pageContactID = get_field('contact_link', 'page_link')->ID;
$contactLink = get_permalink($pageContactID);

if (is_front_page()) {
    $copyrightUrl = '<a href="https://timedoor.net/" class="footer__copyright-link">PT. Timedoor Indonesia.</a>';
} else {
    $copyrightUrl = '<span>PT. Timedoor Indonesia.</span>';
}
?>
<?php
if (!is_page_template('page-home.php') && !is_404()) :
?>
    <section class="breadcrumb-area">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo $pageHomeLink; ?>"> <?php echo pll__('Home Text'); ?></a></li>
                    <?php
                    if (is_singular('post')) :
                    ?>
                        <li class="breadcrumb-item"><a href="<?php echo $newsLink ?>"><?php echo pll__('News'); ?></a></li>
                    <?php
                    elseif (is_singular('case-studies')) :
                    ?>
                        <li class="breadcrumb-item"><a href="<?php echo $caseStudiesLink  ?>"><?php echo pll__('Case Studies'); ?></a></li>
                    <?php
                    elseif (is_singular('thought-leadership')) :
                    ?>
                        <li class="breadcrumb-item"><a href="<?php echo $TLLink  ?>"><?php echo pll__('Thought Leadership'); ?></a></li>
                    <?php
                    endif
                    ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
        </div>
    </section>
<?php
endif;
?>

<footer class="footer section-padding--top">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__infos-container">

                <div class="footer__certification-container">
                    <p class="footer__certification-label"><?php echo pll__('Our Certification'); ?> :</p>
                    <?php
                    if (have_rows('cetifications_lists', 'company-setting')) :
                        while (have_rows('cetifications_lists', 'company-setting')) : the_row();
                            $certificationImage = get_sub_field('certification_image', 'company-setting');
                            $certificationTitle = get_sub_field('certification_title', 'company-setting');
                            $isActivecertf = get_sub_field('certification_is_active', 'company-setting');
                    ?>
                            <?php
                            if ($isActivecertf) :
                            ?>
                                <div class="footer__certification-image-container">
                                    <img width="200" height="68" class="footer__certification-image img-fluid" src="<?php echo esc_url($certificationImage['url']); ?>" alt="<?php echo  $certificationTitle ?>">
                                </div>
                            <?php
                            endif;
                            ?>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="footer__menus-container">
                <div class="footer__menu-container">
                    <h3 class="footer__title">
                        <?php echo pll__('Company'); ?>
                    </h3>
                    <?php
                    $args = array(
                        'theme_location'  => 'footer-menu',
                        'depth'           => 1,
                        'container'       => false,
                        'menu_class'      => 'footer__menu-lists',
                        'add_li_class'    => 'footer__menu-item',
                        'link_class'      => 'footer__menu-link'
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            </div>
            <div class="footer__menus-container">
                <div class="footer__menu-container">
                    <h3 class="footer__title">
                        <?php echo pll__('Our Services'); ?>
                    </h3>
                    <?php
                    $args = array(
                        'theme_location'  => 'footer-menu-two',
                        'depth'           => 1,
                        'container'       => false,
                        'menu_class'      => 'footer__menu-lists',
                        'add_li_class'    => 'footer__menu-item',
                        'link_class'      => 'footer__menu-link'
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            </div>
            <div class="footer__menus-container">
                <div class="footer__menu-container">
                    <h3 class="footer__title">
                        <?php echo pll__('Resources'); ?>
                    </h3>
                    <?php
                    $args = array(
                        'theme_location'  => 'footer-menu-three',
                        'depth'           => 1,
                        'container'       => false,
                        'menu_class'      => 'footer__menu-lists',
                        'add_li_class'    => 'footer__menu-item',
                        'link_class'      => 'footer__menu-link'
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            </div>
            <div class="footer__copyright">
                <p class="footer__copyright-text">© <?php echo date('Y') ?> Frontend Website Development Team.<?php echo pll__('All Rights Reserved.'); ?></p>
                <ul class="footer__social-icon">
                    <?php
                    if (have_rows('social_icons_list', 'company-setting')) :
                        while (have_rows('social_icons_list', 'company-setting')) : the_row();
                            $socialIcon = get_sub_field('social_icon', 'company-setting');
                            $isActive = get_sub_field('social_is_active', 'company-setting');
                    ?>
                            <?php
                            if ($isActive) :
                            ?>
                                <li class="footer__social-item">
                                    <a href="<?php the_sub_field('social_link', 'company-setting'); ?>" class="footer__social-link" target="_blank" rel="noreferrer noopener nofollow">
                                        <img width="16" height="16" class="footer__social-img" src="<?php echo esc_url($socialIcon['url']); ?>" alt="<?php the_sub_field('social_title', 'company-setting'); ?>">
                                    </a>
                                </li>
                            <?php
                            endif;
                            ?>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>