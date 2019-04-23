<?php
/**
 * The Template for displaying Author Archive pages...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

global $wp_query;

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();

if (isset($wp_query->query_vars['author'])) {
	$author = new Timber\User($wp_query->query_vars['author']);
	$context['author'] = $author;
}

Timber::render(['author.twig', 'archive.twig'], $context);
