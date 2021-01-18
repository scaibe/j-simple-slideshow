<?php
/**
 * Plugin Name: Jweb Simple Slideshow
 * Description: Simple Slideshow with different taxonomy
 * Author: Luca Marin
 * Version: 1.0.0
 * Text-domain: j-simple-slideshow
 */


/**
 * Creazione nuovo type post "slideshow"
 */
function jss_posttype_init() {

   $labels = array(
       'name'                  => _x( 'Slideshow', 'Post type general name', 'j-simple-slideshow' ),
       'singular_name'         => _x( 'Slideshow', 'Post type singular name', 'j-simple-slideshow' ),
       'menu_name'             => _x( 'Slideshow', 'Admin Menu text', 'j-simple-slideshow' ),
       'name_admin_bar'        => _x( 'Slideshow', 'Add New on Toolbar', 'j-simple-slideshow' ),
       'add_new'               => __( 'Add New', 'j-simple-slideshow' ),
       'add_new_item'          => __( 'Add New Slide', 'jj-simple-slideshow' ),
       'new_item'              => __( 'New Slide', 'j-simple-slideshow' ),
       'edit_item'             => __( 'Edit Slide', 'j-simple-slideshow' ),
       'view_item'             => __( 'View Slides', 'j-simple-slideshow' ),
       'all_items'             => __( 'All Slides', 'j-simple-slideshow' ),
       'search_items'          => __( 'Search Slides', 'j-simple-slideshow' ),
       'parent_item_colon'     => __( 'Parent Slides:', 'j-simple-slideshow' ),
       'not_found'             => __( 'No Slides found.', 'j-simple-slideshow' ),
       'not_found_in_trash'    => __( 'No Slides found in Trash.', 'j-simple-slideshow' ),
       'featured_image'        => _x( 'Slide Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'j-simple-slideshow' ),
       'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'j-simple-slideshow' ),
       'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'j-simple-slideshow' ),
       'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'j-simple-slideshow' ),
       'archives'              => _x( 'Slideshow archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'j-simple-slideshow' ),
       'insert_into_item'      => _x( 'Insert into slideshow', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'j-simple-slideshow' ),
       'uploaded_to_this_item' => _x( 'Uploaded to this slideshow', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'j-simple-slideshow' ),
       'filter_items_list'     => _x( 'Filter slideshow list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'j-simple-slideshow' ),
       'items_list_navigation' => _x( 'Slideshow list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'j-simple-slideshow' ),
       'items_list'            => _x( 'Slideshow list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'j-simple-slideshow' ),
   );
   $args = array(
       'labels'             => $labels,
       'description'        => 'Slideshow custom post type.',
       'public'             => true,
       'publicly_queryable' => true,
       'show_ui'            => true,
       'show_in_menu'       => true,
       'query_var'          => true,
       'rewrite'            => array( 'slug' => 'slideshow' ),
       'capability_type'    => 'post',
       'has_archive'        => true,
       'hierarchical'       => false,
       'menu_position'      => 20,
       'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
       'taxonomies'         => array( 'slide-visibility' ),
       'show_in_rest'       => true
   );

   register_post_type( 'Shideshow', $args );
}
add_action( 'init', 'jss_posttype_init' );

/**
* Creazione nuova tassonomia per gestione visibilità
*/
function jss_taxonomy_init() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
      'name'              => _x( 'Slide Visibility', 'taxonomy general name', 'j-simple-slideshow' ),
      'singular_name'     => _x( 'Slide Visibility', 'taxonomy singular name', 'j-simple-slideshow' ),
      'search_items'      => __( 'Search Slide Visibility', 'j-simple-slideshow' ),
      'all_items'         => __( 'All Slide Visibilities', 'j-simple-slideshow' ),
      'parent_item'       => __( 'Parent Slide Visibility', 'j-simple-slideshow' ),
      'parent_item_colon' => __( 'Parent Slide Visibility:', 'j-simple-slideshow' ),
      'edit_item'         => __( 'Edit Slide Visibility', 'j-simple-slideshow' ),
      'update_item'       => __( 'Update Slide Visibility', 'j-simple-slideshow' ),
      'add_new_item'      => __( 'Add New Slide Visibility', 'j-simple-slideshow' ),
      'new_item_name'     => __( 'New Slide Visibility Name', 'j-simple-slideshow' ),
      'menu_name'         => __( 'Slide Visibility', 'j-simple-slideshow' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'slide-visibility' ),
  );

  register_taxonomy( 'slide-visibility', array( 'slideshow' ), $args );
}

add_action( 'init', 'jss_taxonomy_init', 0 );

?>
