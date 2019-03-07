<?php
/**
 * Register custom post type and taxonomy...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Core
 * @since 1.0
 * @version 1.0
 */

/**
 * Register custom post type...
 */
/*register_post_type('products', array(
    'labels' => array(
        'name' => _x('Products', 'Post Type General Name', RAF_DOMAIN),
        'singular_name' => _x('Product', 'Post Type Singular Name', RAF_DOMAIN),
        'menu_name' => __('Products', RAF_DOMAIN),
        'parent_item_colon' => __('Products:', RAF_DOMAIN),
        'all_items' => __('All products', RAF_DOMAIN),
        'view_item' => __('View product', RAF_DOMAIN),
        'add_new_item' => __('Add product', RAF_DOMAIN),
        'add_new' => __('Add product', RAF_DOMAIN),
        'edit_item' => __('Edit product', RAF_DOMAIN),
        'update_item' => __('Update product', RAF_DOMAIN),
        'search_items' => __('Search products', RAF_DOMAIN),
        'not_found' => __('Not found', RAF_DOMAIN),
        'not_found_in_trash' => __('Not found in trash', RAF_DOMAIN),
    ),
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'comments',
        'trackbacks',
        'custom-fields',
    ),
    //'taxonomies' => array('categories', 'post_tag'),
    'hierarchical' => false,
    'rewrite' => array('slug' => 'products'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'show_in_rest' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-products',
    'can_export' => true,
    'has_archive' => false,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
));*/

/**
 * Register custom taxonomy...
 */
/*register_taxonomy('company', array('products'), array(
    'hierarchical' => true,
    'labels' => array(
        'name' => _x('Company', 'taxonomy general name', RAF_DOMAIN),
        'singular_name' => _x('Company', 'taxonomy singular name', RAF_DOMAIN),
        'search_items' => __('Search company', RAF_DOMAIN),
        'all_items' => __('All companies', RAF_DOMAIN),
        'parent_item' => __('Parent company', RAF_DOMAIN),
        'parent_item_colon' => __('Parent company:', RAF_DOMAIN),
        'edit_item' => __('Edit company', RAF_DOMAIN),
        'update_item' => __('Update company', RAF_DOMAIN),
        'add_new_item' => __('Add new company', RAF_DOMAIN),
        'new_item_name' => __('New company name', RAF_DOMAIN),
        'menu_name' => __('Companies', RAF_DOMAIN),
    ),
    'rewrite' => array(
        'slug' => 'company',
        'with_front' => false,
        'hierarchical' => true
    ),
));*/

flush_rewrite_rules();
