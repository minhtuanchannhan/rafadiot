<?php
/**
 * The Template for displaying all single posts...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$context = Timber::context();
$post = Timber::query_post();
$context['post'] = $post;
if (post_password_required($post->ID)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}
