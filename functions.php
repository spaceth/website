<?php
/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seed
 */

if( class_exists('Kirki') ) { include_once( dirname( __FILE__ ) . '/inc/kirki.php' );}

/* LAYOUT */
if (!isset($GLOBALS['s_header_m']))             {$GLOBALS['s_header_m']             = 'auto-show';}     // standard, fixed, auto-show
if (!isset($GLOBALS['s_header_d']))             {$GLOBALS['s_header_d']             = 'auto-show';}     // standard, fixed, auto-show
if (!isset($GLOBALS['s_header_action']))        {$GLOBALS['s_header_action']        = array('search');} // search, cart, none
if (!isset($GLOBALS['s_blog_layout']))          {$GLOBALS['s_blog_layout']          = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_layout_single']))   {$GLOBALS['s_blog_layout_single']   = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_columns_m']))       {$GLOBALS['s_blog_columns_m']       = '1';}             // 1,2,3
if (!isset($GLOBALS['s_blog_columns_d']))       {$GLOBALS['s_blog_columns_d']       = '3';}             // 1,2,3,4,5,6
if (!isset($GLOBALS['s_blog_template']))        {$GLOBALS['s_blog_template']        = 'card';}          // list, card, hero, caption
if (!isset($GLOBALS['s_blog_profile']))         {$GLOBALS['s_blog_profile']         = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_blog_archive_profile'])) {$GLOBALS['s_blog_archive_profile'] = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_shop_layout']))          {$GLOBALS['s_shop_layout']          = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_shop_pagebuilder']))     {$GLOBALS['s_shop_pagebuilder']     = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_logo_path']))            {$GLOBALS['s_logo_path']            = 'none';}          // theme folder relative path, such as img/logo.svg .
if (!isset($GLOBALS['s_logo_width']))           {$GLOBALS['s_logo_width']           = '200';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_logo_height']))          {$GLOBALS['s_logo_height']          = '100';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_thumb_width']))          {$GLOBALS['s_thumb_width']          = '350';}           // any number
if (!isset($GLOBALS['s_thumb_height']))         {$GLOBALS['s_thumb_height']         = '184';}           // any number
if (!isset($GLOBALS['s_thumb_crop']))           {$GLOBALS['s_thumb_crop']           = true;}            // true, false
if (!isset($GLOBALS['s_title_style']))          {$GLOBALS['s_title_style']          = 'banner';}        // minimal, banner

/* ADD-ON */
if (!isset($GLOBALS['s_cart_icon']))            {$GLOBALS['s_cart_icon']            = 'cart';}          // cart, cart-o, basket, basket-al, bag, bag-alt
if (!isset($GLOBALS['s_header_scroll']))        {$GLOBALS['s_header_scroll']        = '300';}           // 1-600 px scroll for header effect on home
if (!isset($GLOBALS['s_member_url']))           {$GLOBALS['s_member_url']           = '/my-account/';}  // none, url path such as: /my-account/
if (!isset($GLOBALS['s_member_label']))         {$GLOBALS['s_member_label']         = 'Member';}        // ex: Member, สมาชิก
if (!isset($GLOBALS['s_style_css']))            {$GLOBALS['s_style_css']            = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_jquery']))               {$GLOBALS['s_jquery']               = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_fontawesome']))          {$GLOBALS['s_fontawesome']          = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_flickity']))             {$GLOBALS['s_flickity']             = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_wp_comments']))          {$GLOBALS['s_wp_comments']          = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_admin_bar']))            {$GLOBALS['s_admin_bar']            = 'hide';}          // hide, show

/* CHECK WOOCOMMERCE */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('woocommerce/woocommerce.php')) {
    $GLOBALS['s_is_woo']       = true;
    $GLOBALS['s_member_url']   = '/my-account/';
} else {
    $GLOBALS['s_is_woo']       = false;
}

/* Admin Bar */
if ($GLOBALS['s_admin_bar'] == 'hide') {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Setup Theme
 */
if (!function_exists('seed_setup')) {
    function seed_setup() {
        load_theme_textdomain('seed', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'width'       => $GLOBALS['s_logo_width'],
            'height'      => $GLOBALS['s_logo_height'],
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size($GLOBALS['s_thumb_width'], $GLOBALS['s_thumb_height'], $GLOBALS['s_thumb_crop']);
        register_nav_menus(array(
            'primary' => esc_html__('Main Menu', 'seed'),
            'mobile'  => esc_html__('Mobile Menu', 'seed'),
        ));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
    }
}
add_action('after_setup_theme', 'seed_setup');

function seed_content_width() {
    $GLOBALS['content_width'] = apply_filters('seed_content_width', 750);
}
add_action('after_setup_theme', 'seed_content_width', 0);

/**
 * Register widget area.
 */
function seed_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footbar', 'seed'),
        'id'            => 'footbar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
    'name' => 'In Conversation 1',
    'id' => 'inconversation1',
    'before_widget' => '<div class = "in-conversation-weidget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    register_sidebar(array(
    'name' => 'In Conversation 2',
    'id' => 'inconversation2',
    'before_widget' => '<div class = "in-conversation-weidget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    register_sidebar(array(
    'name' => 'In Conversation 3',
    'id' => 'inconversation3',
    'before_widget' => '<div class = "in-conversation-weidget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    register_sidebar(array(
    'name' => 'In Conversation 4',
    'id' => 'inconversation4',
    'before_widget' => '<div class = "in-conversation-weidget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    register_sidebar(array(
    'name' => 'Cloud Tags',
    'id' => 'cloudtag',
    'before_widget' => '<div class = "cloud-widget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));


}
add_action('widgets_init', 'seed_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function seed_scripts() {

    wp_enqueue_style('s-mobile', get_theme_file_uri('/css/mobile.css'), array(), filemtime(get_theme_file_path('/css/mobile.css')));
    wp_enqueue_style('s-desktop', get_theme_file_uri('/css/desktop.css'), array(), filemtime(get_theme_file_path('/css/desktop.css')), '(min-width: 992px)');

    if ($GLOBALS['s_style_css'] == 'enable') {
        wp_enqueue_style('s-style', get_stylesheet_uri());
    }

    if ($GLOBALS['s_is_woo']) {
        wp_enqueue_style('s-woo', get_theme_file_uri('/css/woo.css'));
    }

    if ($GLOBALS['s_fontawesome'] == 'enable') {
        wp_enqueue_style('s-fa', get_theme_file_uri('/fonts/fontawesome/css/all.min.css'), array(),'5.10.1');
    }

    if ($GLOBALS['s_flickity'] == 'enable') {
        wp_enqueue_script('s-fkt', get_theme_file_uri('/js/flickity.js'), array(), '2.2.1', true);
    }

    wp_enqueue_script('s-scripts', get_theme_file_uri('/js/scripts.js'), array(), filemtime(get_theme_file_path('/js/scripts.js')), true);
    wp_enqueue_script('s-vanilla', get_theme_file_uri('/js/main-vanilla.js'), array(), filemtime(get_theme_file_path('/js/main-vanilla.js')), true);

    if (($GLOBALS['s_jquery'] == 'enable') || $GLOBALS['s_is_woo']) {
        wp_enqueue_script('s-jquery', get_theme_file_uri('/js/main-jquery.js'), array('jquery'), filemtime( get_theme_file_path('/js/main-jquery.js')), true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'seed_scripts');



/**
 * Admin CSS
 */
function seed_admin_style() {
    wp_enqueue_style('seed-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'seed_admin_style');


/**
 * Remove "Category: ", "Tag: ", "Taxonomy: " from archive title
 */
add_filter('get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}

/**
 * Custom WooCommerce Settings
 */
if ($GLOBALS['s_is_woo']) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Shortcode
 */
require get_template_directory() . '/inc/shortcode.php';

/**
 * Redirect after login - Subscriber to home page.
 */
function seed_redirect_to_request( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'subscriber', $user->roles ) ) {
            return home_url();
        } else {
            return $redirect_to;
        }
    } else {
        return $redirect_to;
    }
}
if($GLOBALS['s_member_url'] != 'none') {
    add_filter('login_redirect', 'seed_redirect_to_request', 10, 3);
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {require get_template_directory() . '/inc/jetpack.php';}

/**
 * Smart Slider 3 Pro
 */
function plant_smartslider3_skip_license_modal() {
	return true;
}
add_filter('smartslider3_skip_license_modal', 'plant_smartslider3_skip_license_modal');

/**
 * Include Advanced Custom Fields
 */
define( 'S_ACF_PATH', get_template_directory() . '/vendor/acf/' );
define( 'S_ACF_URL', get_template_directory_uri() . '/vendor/acf/' );
include_once( S_ACF_PATH . 'acf.php' );
add_filter('acf/settings/url', 'seed_acf_settings_url');
function seed_acf_settings_url( $url ) {
    return S_ACF_URL;
}
/**
 * ACF Blocks
 */
require get_template_directory() . '/inc/blocks.php';

function seed_theme_updater() {
	require( get_template_directory() . '/vendor/seedthemes/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'seed_theme_updater' );

/**
 * TGMPA
 */
require_once get_template_directory() . '/vendor/TGMPA/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'plant_register_required_plugins' );

function plant_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Smart Slider 3 Pro',
			'slug'               => 'nextend-smart-slider3-pro',
			'source'             => get_template_directory() . '/vendor/nextend/smartslider3-wordpress-PRO-3.3.24.zip',
			'required'           => false,
			'version'            => '3.3.22',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
        ),
		array(
			'name'               => 'Kirki',
			'slug'               => 'kirki',
			'source'             => get_template_directory() . '/vendor/kirki/kirki.3.0.45.zip',
			'required'           => true,
			'version'            => '3.0.45',
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
	);
	$config = array(
		'id'           => 'plant',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}
