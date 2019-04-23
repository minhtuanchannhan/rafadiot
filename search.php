<?php
/**
 * Search results page...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$templates = ['search.twig', 'archive.twig', 'index.twig'];
$context = Timber::context();
$context['title'] = sprintf(__('Search results for %s', RAF_DOMAIN), get_search_query());
$context['posts'] = new Timber\PostQuery();
Timber::render($templates, $context);
