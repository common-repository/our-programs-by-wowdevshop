<?php

/**
* Plugin Name: Our Programs
* Plugin URI: http://wowdevshop.com
* Description: This plugin registers the 'program' post type, it let's you manage your companies programs.
* Author: XicoOfficial
* Version: 1.2.0
* License: GPLv2
* Author URI: http://wowdevshop.com
* Text Domain: our-programs-by-wowdevshop
*
* @package WOWDevShop
* @subpackage OurPrograms
* @author XicoOfficial
* @since 1.0.0
*/

/**
 * Tell WordPress to load a translation file if it exists for the user's language
 * @since 1.2.0
 */
function wds_our_programs_load_plugin_textdomain() {
    load_plugin_textdomain( 'our-programs-by-wowdevshop', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'wds_our_programs_load_plugin_textdomain' );


//
// Register Custom Program Post Type
//
add_action( 'init', 'wds_our_programs_create_post_type' );

/**
 * register custom post type to work with
 * @since 1.0.0
 */
function wds_our_programs_create_post_type() {
	// set up labels
	$labels = array(
 		'name'               => __('Programs', 'our-programs-by-wowdevshop'),
    	'singular_name'      => __('Program', 'our-programs-by-wowdevshop'),
    	'add_new'            => __('Add New Program', 'our-programs-by-wowdevshop'),
    	'add_new_item'       => __('Add New Program', 'our-programs-by-wowdevshop'),
    	'edit_item'          => __('Edit Program', 'our-programs-by-wowdevshop'),
    	'new_item'           => __('New Program', 'our-programs-by-wowdevshop'),
    	'all_items'          => __('All Programs', 'our-programs-by-wowdevshop'),
    	'view_item'          => __('View Program', 'our-programs-by-wowdevshop'),
    	'search_items'       => __('Search Programs', 'our-programs-by-wowdevshop'),
    	'not_found'          => __('No Program Found', 'our-programs-by-wowdevshop'),
    	'not_found_in_trash' => __('No Program found in Trash', 'our-programs-by-wowdevshop'),
    	'parent_item_colon'  => '',
    	'menu_name'          => __('Programs', 'our-programs-by-wowdevshop'),
        'archives'           => __('Programs Archives', 'our-programs-by-wowdevshop')
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'taxonomies'            => array('program-category' ),
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-format-aside',
        'rewrite'               => true,
        'capability_type'       => 'post',
        'hierarchical'          => true,
        'menu_position'         => 6,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes' ),
        'has_archive'           => true,
        'exclude_from_search'   => false
    );

    //register post type
	register_post_type( 'program', $args);
}



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'wds_our_programs_create_program_taxonomies', 0 );

/**
 * Create own taxonomies for the post type "program"
 * @since 1.0.0
 */
function wds_our_programs_create_program_taxonomies() {
    //Add new taxonomi, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Program Categories', 'our-programs-by-wowdevshop'),
        'singular_name'     => __( 'Program Category', 'our-programs-by-wowdevshop'),
        'search_items'      => __( 'Search Program Categories', 'our-programs-by-wowdevshop'),
        'all_items'         => __( 'All Program Categories', 'our-programs-by-wowdevshop'),
        'parent_item'       => __( 'Parent Program Category', 'our-programs-by-wowdevshop'),
        'parent_item_colon' => __( 'Parent Program Category:', 'our-programs-by-wowdevshop'),
        'edit_item'         => __( 'Edit Program Category', 'our-programs-by-wowdevshop'),
        'update_item'       => __( 'Update Program Category', 'our-programs-by-wowdevshop'),
        'add_new_item'      => __( 'Add New Program Category', 'our-programs-by-wowdevshop'),
        'new_item_name'     => __( 'New Program Category Name', 'our-programs-by-wowdevshop'),
        'menu_name'         => __( 'Program Category', 'our-programs-by-wowdevshop')
    );


    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => true,
        'rewrite'           => array( 'slug' => 'program-category' ),
    );

    register_taxonomy( 'program-category', array( 'program' ), $args );
}



add_filter( 'template_include', 'wds_our_programs_include_template_function', 1 );

/**
 * Checks if there are no defined single and archive templates
 * for the 'Programs' custom post type on the theme, and if not
 * use the ones defined inseide de plugin.
 * @param  String $template_path url of the template
 * @since 1.2.0
 */
function wds_our_programs_include_template_function( $template_path ) {
    if ( get_post_type() == 'program' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-program.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/includes/single-program.php';
            }
        }
    }
    return $template_path;
}

?>
