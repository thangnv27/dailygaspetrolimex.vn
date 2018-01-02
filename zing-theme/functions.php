<?php /* define('WP_POST_REVISIONS', false ); */
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );

include 'inc/image-resizer.php';
include 'inc/post-type/product.php';
include 'inc/widgets/last-post.php';

/* ---------------------------------------------------------------------- */
/* DISABLE WORDPRESS RESIZE
/* ---------------------------------------------------------------------- */
function sgr_filter_image_sizes( $sizes) {
    unset( $sizes['medium']);
    unset( $sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'sgr_filter_image_sizes');

/* ---------------------------------------------------------------------- */
/* DISABLE LINK IMAGE
/* ---------------------------------------------------------------------- */
function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

/* ---------------------------------------------------------------------- */
/* DISABLE WORDPRESS UPDATE
/* ---------------------------------------------------------------------- */
function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','wphidenag');

function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' );

function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

/* ---------------------------------------------------------------------- */
/* DISABLE THE EMOJI'S
/* ---------------------------------------------------------------------- */
function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );   
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );     
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
                return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
                return array();
        }
}

/*
/* ----------------------------------------------------------------------
/* VISUAL COMPOSER
   ----------------------------------------------------------------------
function wpcharming_vc_style() {
	wp_enqueue_style( 'wpcharming-vccustom', get_template_directory_uri() . '/css/vc_custom.css', array(), null );
}

if ( class_exists('WPBakeryVisualComposerAbstract') ) {

	vc_set_as_theme( $disable_updater = true );

	require get_template_directory() . '/inc/vc_mods/vc_mods.php';
	require get_template_directory() . '/inc/vc_mods/vc_shortcodes.php';

	$vc_template_dir =  get_template_directory() . '/inc/vc_mods/vc_templates';
	vc_set_shortcodes_templates_dir( $vc_template_dir );

	add_action('wp_head', 'wpcharming_vc_style', 5);
}

function charming_event() {
	$charming_event_plugin = false;
	if ( class_exists('EM_MS_Globals') ) {
		$charming_event_plugin = true;
	}
	return $charming_event_plugin;
}

function afc_vc_fix() {
	echo '
	<style>
		.repeater .row:before,
		.repeater .row:after {
			display: auto;
			content: none;
		}
	</style>';
}
add_action('admin_head', 'afc_vc_fix');
*/

/* ---------------------------------------------------------------------- */
/* OPTION PAGE CUSTOM FIELD
/* ---------------------------------------------------------------------- */
if( function_exists('acf_set_options_page_title') )
{
	acf_set_options_page_title( __('Theme Options') );
}
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Theme Options' );
}

/* ---------------------------------------------------------------------- */
/* REGISTER MENU
/* ---------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'main-menu', __( 'Main Menu', 'main-menu' ) );
	register_nav_menu( 'danh-muc-menu', __( 'Danh Mục Menu', 'danh-muc-menu' ) );
}

/*============================================================================
 * REGISTER WIDGET
============================================================================*/
add_action('widgets_init', 'zingshop_theme_widgets_init');

function zingshop_theme_widgets_init(){
	register_sidebar(array(
	'name'          => __( 'Sidebar Left', 'zingshop' ),
	'id'            => 'sidebar-left',
	'description'   => __( 'Hien thi noi dung trong vung Sidebar Left', 'zingshop' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));
	
	register_sidebar(array(
	'name'          => __( 'Footer area 1', 'zingshop' ),
	'id'            => 'footer-area-1',
	'description'   => __( 'Hien thi noi dung trong vung Footer 1', 'zingshop' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));

	register_sidebar(array(
	'name'          => __( 'Footer area 2', 'zingshop' ),
	'id'            => 'footer-area-2',
	'description'   => __( 'Hien thi noi dung trong vung Footer 2', 'zingshop' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));

	register_sidebar(array(
	'name'          => __( 'Footer area 3', 'zingshop' ),
	'id'            => 'footer-area-3',
	'description'   => __( 'Hien thi noi dung trong vung Footer 3', 'zingshop' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));

	register_sidebar(array(
	'name'          => __( 'Footer area 4', 'zingshop' ),
	'id'            => 'footer-area-4',
	'description'   => __( 'Hien thi noi dung trong vung Footer 4', 'zingshop' ),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));
}

/* ---------------------------------------------------------------------- */
/* CUT STRING
/* ---------------------------------------------------------------------- */
function cutstr($string, $length) {
	$string = strip_tags ( $string, '<p><a>' );
	if (strlen ( $string ) > $length) {
		return mb_substr($string, 0, $length) . ' ...';
	} else {
		return $string;
	}
}

/* ---------------------------------------------------------------------- */
/* Zing Resize
/* ---------------------------------------------------------------------- */
function zing_resize($url, $width, $height){
	$img = aq_resize($url, $width, $height, true);
	return $img;
}

/* ---------------------------------------------------------------------- */
/* Paginate
/* ---------------------------------------------------------------------- */
function wp_corenavi_table() {
    global $wp_query;
    $big = 999999999;
    $translated = "";
    $total = $wp_query->max_num_pages;
    if($total > 1) echo '<div class="paginate_links">';
    echo paginate_links( array(
            'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => '10',
            'prev_text' => __('Trang sau'),
            'next_text' => __('Trang tiếp'),
    ) );
    if($total > 1) echo '</div>';
}

/*============================================================================
 * SET POSTS PER PAGE CATEGORY
============================================================================*/
function exclude_category( $query ) {
	if ( $query->is_category()) {
		$query->set( 'posts_per_page', '5' );
	}
}
add_action( 'pre_get_posts', 'exclude_category' );