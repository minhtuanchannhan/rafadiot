<?php
/**
 * The main template file...
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$templates = array('index.twig');
if (is_home()) {
    array_unshift($templates, 'home.twig');
}
Timber::render($templates, $context);
