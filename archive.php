<?php
/**
 * The Template for displaying Archive pages...
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$templates = ['archive.twig', 'index.twig'];
$context = Timber::context();

if (is_day()) {
	$context['title'] = get_the_date('D M Y');
} else if (is_month()) {
	$context['title'] = get_the_date('M Y');
} else if (is_year()) {
	$context['title'] = get_the_date('Y');
} else if (is_tag()) {
	$context['title'] = single_tag_title('', false);
} else if (is_category()) {
	$context['title'] = single_cat_title('', false);
	array_unshift($templates, 'archive-' . get_query_var('cat') . '.twig');
} else if (is_post_type_archive()) {
	$context['title'] = post_type_archive_title('', false);
	array_unshift($templates, 'archive-' . get_post_type() . '.twig');
}

$context['posts'] = new Timber\PostQuery();
Timber::render($templates, $context);
