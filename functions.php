<?php
/**
 * Functions...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Functions
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Define theme url...
 */
if (!defined('RAF_URL')) {
    define('RAF_URL', get_template_directory_uri());
}

/**
 * Define theme base path...
 */
if (!defined('RAF_ BASE')) {
    define('RAF_BASE', get_stylesheet_directory());
}

/**
 * Define domain name...
 */
if (!defined('RAF_DOMAIN')) {
    define('RAF_DOMAIN', 'rafadiot');
}

/**
 * Define author name...
 */
if (!defined('RAF_AUTHOR')) {
    define('RAF_AUTHOR', 'Tuan Le Minh');
}

/**
 * Define author url...
 */
if (!defined('RAF_AUTHOR_URL')) {
    define('RAF_AUTHOR_URL', 'https://minhtuanchannhan.com');
}

/**
 * Using Timber...
 */
$timber = new Timber\Timber();

/**
 * Load main class...
 */
require RAF_BASE . '/inc/class-rafadiot.php';
