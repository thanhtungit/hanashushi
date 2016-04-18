<?php 
add_theme_support( 'post-thumbnails', array( 'post', 'page','menus','special-set' ) );
define('TEMPLATE_PATH',get_bloginfo('template_url'));
define('HOME_URL',get_home_url());
define('BlOG_NAME',get_bloginfo('blog_name'));
define('SLOGAN', get_bloginfo('description'));
//register_nav_menu( 'menu-top', 'Primary Top' );
register_nav_menu( 'primary', 'Primary Menu' );
add_image_size( 'thumb-product',228,295,true);
add_image_size( 'thumb-type-menu',327,327,true);
add_image_size( 'thumb-set',400,380,true);
update_option('userpro_trial', 0);
update_option('userpro_activated', 1);
userpro_set_option('userpro_code', 'asdasdsadsadsads');

function my_theme_add_editor_styles() {
    //add_editor_style('editor-style.css');
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );
if( function_exists('acf_add_options_page') ) {
 
   acf_add_options_page(array(
    'page_title'  => 'Options Website',
    'menu_title' => 'Options Website',
    'menu_slug'  => 'theme-general-settings'
   ));
 
     acf_add_options_sub_page(array(
      'page_title'  => 'Header',
      'menu_title' => 'Header',
      'parent_slug' => 'theme-general-settings',
     ));
   acf_add_options_sub_page(array(
    'page_title'  => 'Footer',
    'menu_title' => 'Footer',
    'parent_slug' => 'theme-general-settings',
     ));
  
   
}
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>