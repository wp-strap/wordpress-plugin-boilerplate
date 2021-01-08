<?php
/**
 * The Plugin Name Plugin
 *
 * @package   Plugin_Name
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   {{author_license}}
 * @link      {{author_url}}
 */

namespace ThePluginName\App\General;

use ThePluginName\Common\Abstracts\Base;

/**
 * Class Queries
 *
 * @package ThePluginName\App\General
 * @since 1.0.0
 */
class Queries extends Base
{

    /**
     * Initialize the class.
     *
     * @since 1.0.0
     */
    public function init ()
    {
        /**
         * This general class is always being instantiated as requested in the Bootstrap class
         *
         * @see Bootstrap::__construct
         *
         * Add plugin code here
         */
    }


    /**
     * @param $posts_count
     * @param string $orderby
     * @return \WP_Query
     */
    public function getPosts ( $posts_count, $orderby = 'date' )
    {
        return new \WP_Query ( [
            'post_type'      => PostTypes::POST_TYPE['id'],
            'post_status'    => 'publish',
            'order'          => 'DESC',
            'posts_per_page' => $posts_count,
            'orderby'        => $orderby,
        ] );
    }

    /**
     * Example
     *
     * @return array
     */
    public function getPostIds(): array
    {
        global $wpdb;
        return $wpdb->get_col( "select ID from {$wpdb->posts} LIMIT 3" );
    }
}