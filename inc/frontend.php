<?php
//Thme Options
function tmdr_theme_setup()
{
    add_theme_support('menus');
    register_nav_menus(
        array(
            'secondary-menu' => 'Secondary Location',
            'footer-menu' => 'Footer Menu Location',
            'footer-menu-two' => 'Footer Menu Two Location',
            'footer-menu-three' => 'Footer Menu Three Location',
            'mobile-menu' => 'Mobile Menu Location',
            'language-menu' => 'Language Menu Location'
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'customposttypename'));
}
add_action('init', 'tmdr_theme_setup');

//Register Navwalker
function register_navwalker()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

//Register Sidebar
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'class' => 'custom-sidebar',
            'description' => 'Standard Sidebar',
            'before-title' => '<h3 class="widget-title">',
            'after-title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'class' => 'blog-custom-sidebar',
            'description' => 'Standard Sidebar',
            'before-title' => '<h3 class="widget-title">',
            'after-title' => '</h3>'
        )
    );
}
add_action('widgets_init', 'my_sidebars');

function tmdr_custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'tmdr_custom_excerpt_length', 999);

// Add li class at footer
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Add link class at footer
function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// function add_membership_in_menu($items, $args)
// {
//     global $wp;
//     $currentUrl = get_permalink();

//     $pageSourceToPayID = get_field('source_to_pay_link', 'page_link')->ID;
//     $sourceToPayLink = get_permalink($pageSourceToPayID);

//     $pageElnVoicingID = get_field('elnvoicing_link', 'page_link')->ID;
//     $ElnVoicingLink = get_permalink($pageElnVoicingID);

//     $pageB2BeCommerceID = get_field('B2BeCommerce_link', 'page_link')->ID;
//     $B2BeCommerceLink = get_permalink($pageB2BeCommerceID);

//     $pageNewsID = get_field('news_link', 'page_link')->ID;
//     $newsLink = get_permalink($pageNewsID);

//     $pageCaseStudiesID = get_field('case_studies_link', 'page_link')->ID;
//     $caseStudiesLink = get_permalink($pageCaseStudiesID);

//     $pageTLID = get_field('case_thought_leadership_link', 'page_link')->ID;
//     $TLLink = get_permalink($pageTLID);

   


//     if ($sourceToPayLink == $currentUrl) {
//         $sourceToPayLinkActive = 'active';
//     } else {
//         $sourceToPayLinkActive = '';
//     }

//     if ($ElnVoicingLink  == $currentUrl) {
//         $ElnVoicingLinkActive = 'active';
//     } else {
//         $ElnVoicingLinkActive = '';
//     }

//     if ($B2BeCommerceLink  == $currentUrl) {
//         $B2BeCommerceLinkActive = 'active';
//     } else {
//         $B2BeCommerceLinkActive = '';
//     }


//     if ($newsLink  == $currentUrl) {
//         $newsLinkActive = 'active';
//     } else {
//         $newsLinkActive = '';
//     }

//     if ($caseStudiesLink  == $currentUrl) {
//         $caseStudiesLinkActive = 'active';
//     } else {
//         $caseStudiesLinkActive = '';
//     }

//     if ($TLLink  == $currentUrl) {
//         $TLLinkActive = 'active';
//     } else {
//         $TLLinkActive = '';
//     }

//     $item = "";
//     if ($args->theme_location == 'main-menu') {
//         $item .= '
//         <li class="nav-item dropdown order-3">
//             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
//                 ' . pll__('Our Services') . '
//             </a>
//             <ul class="dropdown-menu">
//                 <li>
//                     <a class="dropdown-item ' . $sourceToPayLinkActive . '" href="' . $sourceToPayLink . '">
//                         <iconify-icon width="28" height="28" class="dropdown-icon" icon="ion:card-outline"></iconify-icon>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('Source to Pay') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Improve goods/services business') . '</p> 
//                         </div>
//                     </a>
//                 </li>
//                 <li>
//                     <a class="dropdown-item ' . $ElnVoicingLinkActive . '" href="' . $ElnVoicingLink . '">
//                         <iconify-icon width="28" height="28" class="dropdown-icon" icon="ion:receipt-outline"></iconify-icon>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('eInvoicing') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Support suppliers and buyers') . '</p> 
//                         </div>
//                     </a>
//                 </li>
//                 <li>
//                     <a class="dropdown-item ' . $B2BeCommerceLinkActive . '" href="' . $B2BeCommerceLink . '">
//                         <iconify-icon width="28" height="28" class="dropdown-icon" icon="ion:business-outline"></iconify-icon>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('B2B eCommerce') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Automating buyer and supplier trade') . ' </p> 
//                         </div>
//                     </a>
//                 </li>
//             </ul>
//         </li>

//         <li class="nav-item dropdown order-4">
//             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
//                 ' . pll__('Resources') . ' 
//             </a>
//             <ul class="dropdown-menu">
//                 <li>
//                     <a class="dropdown-item ' . $newsLinkActive . '" href="' . $newsLink . '">
//                         <iconify-icon width="28" height="28" class="dropdown-icon" icon="ion:newspaper-outline"></iconify-icon>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('News') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Expolore news related to valtatech') . '</p> 
//                         </div>
//                     </a>
//                 </li>
//                 <li>
//                     <a class="dropdown-item ' . $caseStudiesLinkActive . '" href="' . $caseStudiesLink . '">
//                         <iconify-icon width="28" height="28" class="dropdown-icon" icon="ion:briefcase-outline"></iconify-icon>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('Case Studies') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Explore our interesting case study') . '</p> 
//                         </div>
//                     </a>
//                 </li>
//                 <li>
//                     <a class="dropdown-item ' . $TLLinkActive . '" href="' . $TLLink . '">
//                         <svg class="dropdown-icon" width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
//                             <g clip-path="url(#clip0_1822_1380)">
//                             <path d="M18.8253 29.6227H10.4145V27.4838C10.4145 25.4302 12.0854 23.7594 14.1389 23.7594H17.8611C19.9146 23.7594 21.5854 25.4302 21.5854 27.4838V29.6227H21.0604H18.8253ZM31.375 29.6227H30.2063V28.0912C30.2063 26.3045 29.0932 24.7734 27.5245 24.1541C28.4458 23.3268 29.0264 22.1266 29.0264 20.7933C29.0264 18.3025 27.0001 16.2761 24.5093 16.2761C23.3463 16.2761 22.2846 16.7179 21.4833 17.4422C21.1034 14.7561 18.7894 12.6834 16 12.6834C13.2106 12.6834 10.8966 14.7561 10.5167 17.4422C9.71539 16.7179 8.65367 16.2761 7.49075 16.2761C4.9999 16.2761 2.97356 18.3025 2.97356 20.7933C2.97356 22.1266 3.55425 23.3267 4.47549 24.1541C2.90677 24.7734 1.79362 26.3045 1.79362 28.0912V29.6227H0.625C0.224584 29.6227 -0.1 29.9473 -0.1 30.3477C-0.1 30.7481 0.224584 31.0727 0.625 31.0727H18.8253H21.0604H31.375C31.7753 31.0727 32.1 30.7481 32.1 30.3477C32.1 29.9473 31.7753 29.6227 31.375 29.6227ZM24.5093 17.7261C26.2004 17.7261 27.5764 19.1021 27.5764 20.7933C27.5764 22.4845 26.2005 23.8605 24.5093 23.8605C22.818 23.8605 21.4421 22.4845 21.4421 20.7933C21.4421 19.1021 22.8181 17.7261 24.5093 17.7261ZM16 14.1334C18.254 14.1334 20.088 15.9674 20.088 18.2214C20.088 20.4753 18.254 22.3094 16 22.3094C13.746 22.3094 11.9121 20.4754 11.9121 18.2214C11.9121 15.9675 13.746 14.1334 16 14.1334ZM4.42356 20.7933C4.42356 19.1022 5.79954 17.7261 7.49075 17.7261C9.18196 17.7261 10.5579 19.1021 10.5579 20.7933C10.5579 22.4845 9.18196 23.8605 7.49075 23.8605C5.79954 23.8605 4.42356 22.4845 4.42356 20.7933ZM3.24362 28.0912C3.24362 26.558 4.49116 25.3105 6.02437 25.3105H8.95706C9.12457 25.3105 9.27402 25.3243 9.42253 25.3557C9.12833 26.0052 8.96444 26.7258 8.96444 27.4838V29.6228H3.24362V28.0912ZM12.5574 22.5565C12.1324 22.6932 11.7312 22.8835 11.3618 23.1194C11.5866 22.7466 11.7592 22.3387 11.8692 21.9062C12.0796 22.1419 12.3099 22.3595 12.5574 22.5565ZM20.6383 23.1195C20.2689 22.8836 19.8677 22.6932 19.4426 22.5565C19.6901 22.3595 19.9204 22.1419 20.1308 21.9062C20.2408 22.3388 20.4134 22.7466 20.6383 23.1195ZM23.0355 29.6227V27.4838C23.0355 26.7258 22.8716 26.0052 22.5774 25.3557C22.7259 25.3243 22.8754 25.3105 23.0429 25.3105H25.9756C27.5088 25.3105 28.7563 26.558 28.7563 28.0912V29.6227H23.0355Z" fill="#30344D" stroke="black" stroke-width="0.2"/>
//                             <path d="M5.85643 10.5361L5.85643 10.5362L5.74967 11.7664L6.88664 11.2847C6.88665 11.2847 6.88666 11.2847 6.88667 11.2847C7.06741 11.2081 7.27156 11.2081 7.45231 11.2847C7.45232 11.2847 7.45233 11.2847 7.45234 11.2847L8.58931 11.7664L8.48255 10.5362L8.48255 10.5361C8.46559 10.3405 8.52866 10.1465 8.65734 9.99821L8.73286 10.0638L8.65735 9.9982L9.4668 9.06568L8.2638 8.78705C8.07255 8.74276 7.9074 8.62278 7.80619 8.45457C7.80618 8.45457 7.80618 8.45457 7.80618 8.45456L7.16943 7.39656L6.53274 8.45456L6.53273 8.45457L6.44705 8.40301L5.85643 10.5361ZM5.85643 10.5361C5.87339 10.3405 5.81032 10.1465 5.68163 9.99821L5.60611 10.0638M5.85643 10.5361L5.60611 10.0638M5.60611 10.0638L5.68163 9.9982M5.60611 10.0638L5.68163 9.9982M5.68163 9.9982L4.87218 9.06568L5.68163 9.9982ZM4.69982 13.2113L4.69983 13.2113C5.01233 13.4384 5.4122 13.4841 5.76794 13.3334L7.16949 12.7396L8.57103 13.3334C8.57103 13.3334 8.57104 13.3334 8.57104 13.3334C8.70931 13.392 8.85457 13.4209 8.99893 13.4209C9.22536 13.4209 9.44859 13.3497 9.63916 13.2114L9.6392 13.2114C9.95178 12.9843 10.1188 12.6181 10.0854 12.2332L9.95378 10.7168L10.9516 9.56737L10.8761 9.50182L10.9516 9.56737C11.2048 9.27564 11.2849 8.88128 11.1655 8.51385C11.0461 8.14642 10.7495 7.8745 10.3732 7.78734L10.3732 7.78733L8.89026 7.44389L8.10536 6.13969C7.90621 5.80876 7.55581 5.61069 7.16955 5.61069C6.78323 5.61069 6.4329 5.80869 6.23369 6.13969L6.23368 6.13969L5.44878 7.44389L3.96601 7.78733C3.966 7.78733 3.966 7.78733 3.96599 7.78733C3.58956 7.87444 3.29298 8.14644 3.17357 8.51378C3.05417 8.88115 3.13423 9.27556 3.38746 9.56736L3.38747 9.56737L4.38533 10.7168L4.25374 12.2332C4.22033 12.6181 4.38733 12.9842 4.69982 13.2113Z" fill="#30344D" stroke="black" stroke-width="0.2"/>
//                             <path d="M26.2712 13.2413L26.2322 13.3333L24.8306 12.7395L23.4291 13.3333L23.429 13.3333C23.0733 13.4839 22.6735 13.4384 22.361 13.2113C22.0484 12.9842 21.8814 12.6181 21.9148 12.2332L22.0464 10.7168L21.0486 9.56737L21.0486 9.56736C20.7953 9.2755 20.7153 8.88108 20.8348 8.51372C20.8348 8.51371 20.8348 8.51371 20.8348 8.5137L20.9299 8.54463C21.0384 8.21063 21.3076 7.96394 21.6497 7.88476L26.2712 13.2413ZM26.2712 13.2413L26.2322 13.3333C26.3705 13.3919 26.5157 13.4209 26.66 13.4209C26.8864 13.4209 27.1097 13.3496 27.3003 13.2114L27.3004 13.2113C27.613 12.9843 27.7799 12.6181 27.7466 12.2333L27.7466 12.2332L27.615 10.7168L28.6128 9.56737L28.6128 9.56736C28.8659 9.27563 28.9461 8.88128 28.8267 8.51385C28.7073 8.14642 28.4107 7.8745 28.0343 7.78733L26.5514 7.44389L25.7665 6.13975C25.5673 5.80877 25.2171 5.61069 24.8307 5.61069C24.4443 5.61069 24.094 5.80868 23.8948 6.13969C23.8948 6.1397 23.8948 6.1397 23.8948 6.1397L23.11 7.44389L21.6272 7.78733M26.2712 13.2413L21.6272 7.78733M21.6272 7.78733C21.6272 7.78733 21.6272 7.78733 21.6272 7.78733L21.6272 7.78733ZM24.1939 8.45463C24.0926 8.62283 23.9275 8.74282 23.7362 8.78711L23.7362 8.78712L22.5333 9.06563L23.3427 9.99814L23.2672 10.0637L23.3427 9.99814C23.4714 10.1464 23.5345 10.3405 23.5175 10.5361L23.5175 10.5361L23.4107 11.7663L24.5477 11.2846C24.5477 11.2846 24.5477 11.2846 24.5477 11.2846C24.7286 11.208 24.9326 11.2081 25.1134 11.2846L25.1134 11.2846L26.2504 11.7663L26.1437 10.5362L26.1437 10.5361C26.1268 10.3406 26.1898 10.1465 26.3185 9.99821L26.394 10.0638L26.3185 9.9982L27.1279 9.06568L25.925 8.78705C25.925 8.78705 25.925 8.78705 25.925 8.78705C25.7337 8.74275 25.5686 8.62277 25.4673 8.45467L25.4673 8.45463L24.8306 7.39663L24.1939 8.45463ZM24.1939 8.45463L24.1939 8.45463L24.1082 8.40307L24.1939 8.45463Z" fill="#30344D" stroke="black" stroke-width="0.2"/>
//                             <path d="M15.9999 2.63185L16.9339 4.18397L16.9339 4.18399C17.0352 4.35216 17.2002 4.47215 17.3916 4.51645C17.3916 4.51645 17.3916 4.51645 17.3916 4.51645L19.1563 4.92515L17.9688 6.2931L17.9688 6.29311C17.8401 6.44138 17.7771 6.63546 17.794 6.83101L17.794 6.83105L17.9506 8.6357L16.2827 7.92908L16.2826 7.92908L16.2436 8.02116C16.1658 7.98816 16.0828 7.97166 15.9999 7.97166C15.917 7.97166 15.834 7.98816 15.7561 8.02109L15.9999 2.63185ZM15.9999 2.63185L15.0658 4.1839M15.9999 2.63185L14.0491 8.63563L14.2058 6.83099L14.2058 6.83098C14.2227 6.6354 14.1597 6.44125 14.031 6.29304C14.031 6.29304 14.031 6.29303 14.031 6.29303L12.8435 4.92509L14.6082 4.51639C14.6082 4.51639 14.6082 4.51639 14.6082 4.51639C14.7995 4.47209 14.9646 4.3521 15.0658 4.1839M15.0658 4.1839L15.0658 4.18391L14.9801 4.13234L15.0658 4.1839ZM11.2223 4.39845L11.2223 4.39845C11.0935 4.79511 11.1799 5.22078 11.4533 5.53565L12.7345 7.01166L12.5656 8.95887C12.5656 8.95888 12.5656 8.95888 12.5656 8.95889C12.5295 9.37434 12.7098 9.76957 13.0472 10.0147C13.2528 10.1641 13.4939 10.241 13.7382 10.241C13.8941 10.241 14.0508 10.2098 14.2002 10.1465L14.1612 10.0544L14.2002 10.1465L15.9999 9.38401L17.7996 10.1464C18.1834 10.3091 18.6151 10.2597 18.9525 10.0146L18.9525 10.0146C19.29 9.7695 19.4702 9.37427 19.4342 8.95883L19.2652 7.01159L20.5463 5.53566C20.8198 5.2208 20.9063 4.79506 20.7774 4.39845C20.6486 4.00177 20.3284 3.70815 19.9221 3.61405L18.018 3.1731L17.0101 1.49847C16.7951 1.14117 16.417 0.927344 16 0.927344H15.9999C15.5829 0.927344 15.2047 1.14116 14.9897 1.49846C14.9897 1.49847 14.9897 1.49847 14.9897 1.49847L13.9817 3.17317L12.0776 3.61411L12.0776 3.61411C11.6713 3.70821 11.3511 4.00184 11.2223 4.39845Z" fill="#30344D" stroke="black" stroke-width="0.2"/>
//                             </g>
//                             <defs>
//                             <clipPath id="clip0_1822_1380">
//                             <rect width="32" height="32" fill="white"/>
//                             </clipPath>
//                             </defs>
//                         </svg>
//                         <div class="dropdown-info">
//                             <p class="dropdown-info__title">' . pll__('Thought Leadership') . '</p> 
//                             <p class="dropdown-info__description">' . pll__('Explore about thought leadership') . '</p> 
//                         </div>
//                     </a>
//                 </li>
//             </ul>
//         </li>
//         ';
//         $items .= $item;
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_items', 'add_membership_in_menu', 10, 2);
