<?php

//=============================================
//=         CHARGEMENT DES SCRIPTS
//=============================================

define('BC_VERSION', '1.0.0');

// chargement dans le front-end
function bc_scripts()
{
    // chargement des styles
    wp_enqueue_style('bc_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), BC_VERSION, 'all');
        
    if(is_front_page(  )):
        // animate.css
        wp_enqueue_style( 'bc_animate', get_template_directory_uri().'/css/animate.css', array(), BC_VERSION, 'all' );
        // jarallax
        wp_enqueue_style( 'bc_jarallax', get_template_directory_uri().'/css/jarallax.css', array(), BC_VERSION, 'all' );
        // custom
        wp_enqueue_style('bc_custom', get_template_directory_uri() . '/style.css', array('bc_bootstrap-core', 'bc_animate'), BC_VERSION, 'all');
    else:  
        // custom      
        wp_enqueue_style('bc_custom', get_template_directory_uri() . '/style.css', array('bc_bootstrap-core'), BC_VERSION, 'all');
    endif;


    // chargement des scripts
    // bootstrap
    wp_enqueue_script('bc_bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), BC_VERSION, true);
    // sly
    wp_enqueue_script('bc_sly_script', get_template_directory_uri() . '/js/sly.js', array('jquery'), BC_VERSION, true);
    // jarallax
    wp_enqueue_script('bc_parallax_script', get_template_directory_uri() . '/js/jarallax.min.js', array('jquery'), BC_VERSION, true);
    // custom
    wp_enqueue_script('bc_main_script', get_template_directory_uri() . '/js/main.js', array('jquery', 'bc_bootstrap-js', 'bc_sly_script'), BC_VERSION, true);
}

add_action('wp_enqueue_scripts', 'bc_scripts');

//=============================================
//=             UTILITAIRES
//=============================================

function bc_setup()
{
    // support des vignettes
    add_theme_support('post-thumbnails');
    // active la gesion des menus
    register_nav_menus(array('primary' => 'principal'));
    // custom navigation walker
    require_once get_template_directory() . '/includes/wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'bc_setup');

//=============================================
//=        STYLES / SCRIPTS DASHBOARD
//=============================================

// chargement dans l'admin
function bc_admin_init()
{
    // ============ action1
    function bc_admin_scripts()
    {
        if (isset($_GET['page']) || $_GET['page'] == 'bc_theme_opts') {
            // chargement des styles
            wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), BC_VERSION);
        }

        wp_enqueue_media();
        wp_enqueue_script('bc-admin-script', get_template_directory_uri() . '/js/admin-options.js', array('jquery'), BC_VERSION, true);
    }

    add_action('admin_enqueue_scripts', 'bc_admin_scripts');
    
    // ============ action2
    include('includes/save-options-page.php');
    add_action('admin_post_bc_save_options', 'bc_save_options');
}

add_action('admin_init', 'bc_admin_init');

//=============================================
//=          ACTIVATION DES OPTIONS
//=============================================

function bc_activ_options()
{
    $theme_opts = get_option('bc_opts');
    if ($theme_opts == false) {
        $opts = array(
            'image_logo_url' => '',
            'legend_logo' => '',
            'image_banner_url' => '',
            'image_freebie_url' => '',
            'legend_freebie' => ''
        );
        add_option('bc_opts', $opts);
    }
}

add_action('after_switch_theme', 'bc_activ_options');

//=============================================
//=          MENU OPTION DU THEME
//=============================================
function bc_admin_menus()
{
    add_menu_page('Logo Options', 'Options du thème', 'publish_pages', 'bc_theme_opts', 'bc_build_options_page');

    include('includes/build-options-page.php');
}

add_action('admin_menu', 'bc_admin_menus');