<?php
/*
    Template Name: Contact
*/
?>
<?php get_header(); ?>
<main>
    <section class="contact-form section-padding">
        <div class="container">
            <div class="contact-form__grid" data-aos="fade-up">
                <div class="contact-form__inner">
                    <div class="contact-form__info-container">
                        <div class="section-title-wrapper">
                            <?php
                            $pageContactID = get_field('contact_link', 'page_link')->ID;
                            $pageContactLink = get_permalink($pageContactID);
                            $pagePrivacyID = get_field('privacy_notice_link', 'page_link')->ID;
                            $pagePrivacyLink = get_permalink($pagePrivacyID);

                            $page_contact_title = get_field('page_contact_title', $pageContactID);
                            $page_contact_subtitle = get_field('page_contact_subtitle', $pageContactID);
                            $page_contact_description = get_field('page_contact_description', $pageContactID);

                            ?>
                            <h1 class="section-title"><?= $page_contact_title; ?></h1>
                            <p class="section-title__subtitle"><?= $page_contact_subtitle; ?></p>
                            <p class="section-title__description"><?= $page_contact_description; ?> </p>
                        </div>
                        <ul class="contact-form__info-list">
                            <?php
                            $company_address = get_field('company_address', 'company-setting');
                            $company_email = get_field('company_email', 'company-setting');
                            $phone_number = get_field('phone_number', 'company-setting');
                            $phone_display_text = get_field('phone_display_text', 'company-setting');
                            $linkedin_link = get_field('linkedin_link', 'company-setting');

                            ?>
                            <li class="contact-form__item">
                                <iconify-icon class="contact-form__icon" icon="ion:mail" style="color: #0fd7bd;"></iconify-icon>
                                <a href="mailto: <?= $company_email; ?>" class="contact-form__link"> <?= $company_email; ?></a>
                            </li>
                            <li class="contact-form__item">
                                <iconify-icon class="contact-form__icon" icon="ion:call" style="color: #0fd7bd;"></iconify-icon>
                                <a href="tel: <?= $phone_number; ?>" class="contact-form__link"> <?= $phone_display_text; ?></a>
                            </li>
                            <li class="contact-form__item">
                                <svg class="contact-form__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.429 6.969H11.143V8.819C11.678 7.755 13.05 6.799 15.111 6.799C19.062 6.799 20 8.917 20 12.803V20H16V13.688C16 11.475 15.465 10.227 14.103 10.227C12.214 10.227 11.429 11.572 11.429 13.687V20H7.429V6.969ZM0.57 19.83H4.57V6.799H0.57V19.83ZM5.143 2.55C5.14315 2.88528 5.07666 3.21724 4.94739 3.52659C4.81812 3.83594 4.62865 4.11651 4.39 4.352C3.9064 4.83262 3.25181 5.10165 2.57 5.1C1.88939 5.09954 1.23631 4.8312 0.752 4.353C0.514211 4.11671 0.325386 3.83582 0.196344 3.52643C0.0673015 3.21704 0.000579132 2.88522 0 2.55C0 1.873 0.27 1.225 0.753 0.747C1.23689 0.268158 1.89024 -0.000299211 2.571 2.50265e-07C3.253 2.50265e-07 3.907 0.269 4.39 0.747C4.872 1.225 5.143 1.873 5.143 2.55Z" fill="#0FD7BD" />
                                </svg>
                                <a href=" <?= $linkedin_link; ?>" class="contact-form__link">Valta Technology Group</a>
                            </li>
                            <li class="contact-form__item">
                                <iconify-icon class="contact-form__icon" icon="ion:location" style="color: #0fd7bd;"></iconify-icon>
                                <?= $company_address; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-form__form-container">
                        <?php
                        // $currentLanguage = pll_current_language();
                        // switch ($currentLanguage) {
                        //     case "en":
                        //         echo do_shortcode('[contact-form-7 id="734" title="Contact form EN"]');
                        //         break;
                        //     case "ja":
                        //         echo do_shortcode('[contact-form-7 id="912" title="Contact form JP"]');
                        //         break;
                        //     case "sg":
                        //         echo do_shortcode('[contact-form-7 id="1040" title="Contact form SG"]');
                        //         break;
                        //     default:
                        //         echo do_shortcode('[contact-form-7 id="234" title="Contact EN"]');
                        // }
                        // $thankyouUrl = get_permalink(get_field('thank_you_link', 'page_link')->ID);
                        // wp_localize_script('page-contact-js', 'thankyouUrl', $thankyouUrl);
                        ?>
                        <script src='https://valtatechnologygroup.freshsales.io/web_forms/9225e04226953affba2af690223d66ae27416ab010ed22f6ae33ded686be4dd7/form.js' crossorigin='anonymous' id='fs_9225e04226953affba2af690223d66ae27416ab010ed22f6ae33ded686be4dd7'></script>
                        <!-- <div class="mb-3 text-center">
                            <p>
                                <?php echo pll__('This site is protected by reCAPTCHA and the Google'); ?><a href="https://policies.google.com/privacy"> Privacy Policy </a>and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-details section-padding--bottom">
        <div class="container">
            <div class="contact-details__grid" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-details__inner">
                    <div class="section-title-wrapper">
                        <?php
                        $where_are_we_based_title = get_field('where_are_we_based_title', $pageContactID);
                        ?>
                        <h2 class="section-title">
                            <?= $where_are_we_based_title; ?>
                        </h2>
                    </div>

                    <div class="contact-details__location-grid">
                        <?php
                        if (have_rows('where_are_we_based', $pageContactID)) :
                            while (have_rows('where_are_we_based', $pageContactID)) : the_row();

                                // Get parent value.
                                $where_are_we_based_list_title = get_sub_field('where_are_we_based_list_title', $pageContactID);
                        ?>
                                <div class="contact-details__location-container">
                                    <h3 class="contact-details__location-title"><?= $where_are_we_based_list_title; ?></h3>
                                    <ul class="contact-details__location-list">
                                        <?php
                                        if (have_rows('service_available_list', $pageContactID)) :
                                            while (have_rows('service_available_list', $pageContactID)) : the_row();

                                                // Get sub value.
                                                $service_available_list_item = get_sub_field('service_available_list_item', $pageContactID);
                                        ?>
                                                <li class="contact-details__location-item"><?= $service_available_list_item; ?></li>

                                        <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>