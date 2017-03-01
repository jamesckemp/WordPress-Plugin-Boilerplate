<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Quotelist
 * @subpackage Quotelist/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Quotelist
 * @subpackage Quotelist/includes
 * @author     James Kemp <me@jckemp.com>
 */
class Quotelist_Post_Types {

    /**
     * Add a post type
     *
     * @param arr $args
     */
    public static function add( $args = array() ) {

        if( empty( $args ) )
            return;

        $defaults = array(
            "plural" => "",                         // !required (str)
            "singular" => "",                       // !required (str)
            "key" => false,                         // !required (str)
            "rewrite_slug" => false,                // !recommended if has frontend visibility (str)

            "rewrite_with_front" => false,
            "rewrite_feeds" => true,
            "rewrite_pages" => true,
            "menu_icon" => "dashicons-admin-post",
            'hierarchical' => false,
            'supports' => array( 'title' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        );

        $args = wp_parse_args( $args, $defaults );

        if( !$args['key'] )
            return;

        $labels = array(
            'name' => $args['plural'],
            'singular_name' => $args['singular'],
            'add_new' => _x( 'Add New', 'six' ),
            'add_new_item' => _x( sprintf('Add New %s', $args['singular']), 'six' ),
            'edit_item' => _x( sprintf('Edit %s', $args['singular']), 'six' ),
            'new_item' => _x( sprintf('New %s', $args['singular']), 'six' ),
            'view_item' => _x( sprintf('View %s', $args['singular']), 'six' ),
            'search_items' => _x( sprintf('Search %s', $args['plural']), 'six' ),
            'not_found' => _x( sprintf('No %s found', strtolower($args['plural'])), 'six' ),
            'not_found_in_trash' => _x( sprintf('No %s found in Trash', strtolower($args['plural'])), 'six' ),
            'parent_item_colon' => _x( sprintf('Parent %s:', $args['singular']), 'six' ),
            'menu_name' => $args['plural']
        );

        $post_type_args = array(
            'labels' => $labels,
            'hierarchical' => $args['hierarchical'],
            'supports' => $args['supports'],
            'public' => $args['public'],
            'show_ui' => $args['show_ui'],
            'show_in_menu' => $args['show_in_menu'],
            'menu_icon' => $args['menu_icon'],
            'show_in_nav_menus' => $args['show_in_nav_menus'],
            'publicly_queryable' => $args['publicly_queryable'],
            'exclude_from_search' => $args['exclude_from_search'],
            'has_archive' => $args['has_archive'],
            'query_var' => $args['query_var'],
            'can_export' => $args['can_export'],
            'capability_type' => $args['capability_type'],
            'rewrite' => false
        );

        if( $args['rewrite_slug'] ) {
            $post_type_args['rewrite'] = array(
                "slug" => $args['rewrite_slug'],
                "with_front" => $args['rewrite_with_front'],
                "feeds" => $args['rewrite_feeds'],
                "pages" => $args['rewrite_pages']
            );
        }

        register_post_type( $args['key'], $post_type_args );

    }

}