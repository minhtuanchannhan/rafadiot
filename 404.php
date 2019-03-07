<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$context = Timber::get_context();
Timber::render('404.twig', $context);
