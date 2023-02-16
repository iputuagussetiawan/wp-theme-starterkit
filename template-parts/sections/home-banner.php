<section class="banner">
    <div class="swiper banner__slider">
        <div class="swiper-wrapper">
            <?php
            if (have_rows('banner_slider')) :
                while (have_rows('banner_slider')) : the_row();
                    $bannerTitle = get_sub_field('banner_title');
                    $bannerDescription = get_sub_field('banner_description');
                    $image = get_sub_field('banner_image');
                    $imageMobile = get_sub_field('banner_image_mobile');
                    $isShowLink = get_sub_field('is_show_link');
                    $bannerButtonType = get_sub_field_object('banner_button_type');

                    if (isset($bannerButtonType['value'])) {
                        $bannerButtonTypeValue =  $bannerButtonType['value'];
                    } else {
                        $bannerButtonTypeValue =  '';
                    }
                    $bannerButtonText = get_sub_field('banner_button_text');
                    $bannerButtonLinkInternal = get_sub_field('banner_button_link_internal');
                    $isExternalLink = get_sub_field('is_external_link');
                    $bannerButtonLinkExternal = get_sub_field('banner_button_link_external');
                    $bannerBtnClass = '';
                    $bannerBtnLink = '';
                    $bannerBtnLinkATTR = '';

                    switch ($bannerButtonTypeValue) {
                        case 'primary':
                            $bannerBtnClass = 'btn btn-primary';
                            break;
                        case 'info':
                            $bannerBtnClass = 'btn btn-info';
                            break;
                        case 'warning':
                            $bannerBtnClass = 'btn btn-warning';
                            break;
                        case 'danger':
                            $bannerBtnClass = 'btn btn-danger';
                            break;
                        case 'success':
                            $bannerBtnClass = 'btn btn-success';
                            break;
                        default:
                            $bannerBtnClass = 'btn btn-primary';
                    }
                    if ($isExternalLink) {
                        $bannerBtnLink = $bannerButtonLinkExternal;
                        $bannerBtnLinkATTR = 'target="_blank" rel="noreferrer noopener nofollow"';
                    } else {
                        $bannerBtnLink =  $bannerButtonLinkInternal;
                        $bannerBtnLinkATTR = '';
                    }
            ?>
                    <div class="swiper-slide">
                        <div class="banner__inner">
                            <div class="banner__info-container" data-aos="fade-up" data-aos-delay="100">
                                <h1 class="banner__title"><?php echo $bannerTitle ?></h1>
                                <div class="banner__description">
                                    <?php echo $bannerDescription ?>
                                </div>
                                <div class="banner__btn-wrapper">
                                    <?php
                                    // Loop over sub repeater rows.
                                    if (have_rows('banner_link')) :
                                        while (have_rows('banner_link')) : the_row();
                                            // Get sub value.
                                            $is_show_link = get_sub_field('is_show_link');
                                            $banner_button_type = get_sub_field('banner_button_type');
                                            $banner_button_text = get_sub_field('banner_button_text');
                                            $is_external_link = get_sub_field('is_external_link');
                                            $banner_button_link_internal = get_sub_field('banner_button_link_internal');
                                            $banner_button_link_external = get_sub_field('banner_button_link_external');

                                            $bannerBtnClass = '';
                                            $bannerBtnLink = '';
                                            $bannerBtnLinkATTR = '';

                                            $currentLanguage = pll_current_language();
                                            switch ($currentLanguage) {
                                                case "ja":
                                                    $btnTypeLanguage = 'ja';
                                                    break;
                                                default:
                                                    $btnTypeLanguage = '';
                                            }

                                            switch ($banner_button_type) {
                                                case 'primary':
                                                    $bannerBtnClass = 'btn btn-primary';
                                                    break;
                                                case 'secondary':
                                                    $bannerBtnClass = 'btn btn-secondary';
                                                    break;
                                                default:
                                                    $bannerBtnClass = 'btn btn-primary';
                                            }
                                            if ($is_external_link) {
                                                $bannerBtnLink = $banner_button_link_external;
                                                $bannerBtnLinkATTR = 'target="_blank" rel="noreferrer noopener nofollow"';
                                            } else {
                                                $bannerBtnLink =  $banner_button_link_internal;
                                                $bannerBtnLinkATTR = '';
                                            }
                                    ?>
                                            <?php
                                            if ($is_show_link) :
                                            ?>
                                                <a href="<?php echo $bannerBtnLink ?>" <?php echo $bannerBtnLinkATTR ?> class="<?php echo $bannerBtnClass ?> <?= $btnTypeLanguage; ?>"><?php echo  $banner_button_text ?></a>
                                            <?php
                                            endif;
                                            ?>
                                    <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="banner__image-container" data-aos="fade-left">
                                <?php
                                if (!empty($image)) : ?>
                                    <picture>
                                        <source media="(min-width:768px)" srcset="<?php echo esc_url($image['url']); ?>">
                                        <img class="banner__image" src="<?php echo esc_url($imageMobile['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </picture>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        <!-- <div class="swiper-button-next banner__next"></div>
        <div class="swiper-button-prev banner__prev"></div> -->
    </div>
    <!-- <div class="swiper-pagination banner__pagination"></div> -->
</section>