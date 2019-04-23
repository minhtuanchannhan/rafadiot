<?php
/**
 * Third party plugins that hijack the theme will call wp_footer() to get the footer template.
 * We use this to end our output buffer (started in header.php) and render into the view/page-plugin.twig template.
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Template
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$timberContext = $GLOBALS['timberContext'];

if (!isset($timberContext)) {
    throw new \Exception(__('Timber context not set in footer.', RAF_DOMAIN));
}

$timberContext['content'] = ob_get_contents();
ob_end_clean();
$templates = ['page-plugin.twig'];
Timber::render($templates, $timberContext);
