<?php
/**
 * Default class of theme...
 *
 * @author Tuan Le Minh <minhtuanchannhan@gmail.com>
 * @package Rafadiot
 * @subpackage Core
 * @since 1.0
 * @version 1.0
 * @link https://developer.wordpress.org/themes/
 */

if (!class_exists('Rafadiot')) {
	/**
	 * Class Rafadiot
	 */
	class Rafadiot extends TimberSite
	{
		/**
		 * Menu depth...
		 */
		const RAF_DEPTH = 3;

		/**
		 * Rafadiot constructor.
		 *
		 * @Todo Uncomment if you need any functions...
		 */
		public function __construct()
		{
			/**
			 * --------------------------------------------------------------------------
			 * Default theme support...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Add RSS feed links to HTML...
			 */
			// add_theme_support('automatic-feed-links');
			/**
			 * Enable plugins and themes to manage title (wp_title())...
			 */
			add_theme_support('title-tag');
			/**
			 * Add post-type thumbnails...
			 */
			add_theme_support('post-thumbnails', ['post' /*'page', 'custom-post-type'*/]);
			/**
			 * Allow HTML5 markup...
			 */
			add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
			/**
			 * Add post formats...
			 */
			// add_theme_support('post-formats', ['aside', 'image', 'video', 'quote', 'link']);
			/**
			 * Add editor style...
			 */
			// add_editor_style(RAF_URL . '/assets/css/editor.min.css');
			/**
			 * Add excerpt for page...
			 */
			// add_post_type_support('page', 'excerpt');
			/**
			 * --------------------------------------------------------------------------
			 * End theme support...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * --------------------------------------------------------------------------
			 * Default hook action...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Theme load...
			 */
			// add_action('init', [$this, 'raf_theme_load']);
			/**
			 * After setup theme...
			 */
			add_action('after_setup_theme', [$this, 'raf_theme_setup']);
			/**
			 * Enqueue styles...
			 */
			add_action('wp_enqueue_scripts', [$this, 'raf_load_styles']);
			/**
			 * Enqueue scripts...
			 */
			add_action('wp_enqueue_scripts', [$this, 'raf_load_scripts']);
			/**
			 * Modify widget...
			 */
			add_action('widgets_init', [$this, 'raf_modify_default_widgets'], 11);
			/**
			 * Remove admin bar...
			 */
			add_action('wp_before_admin_bar_render', [$this, 'raf_wp_admin_bar_remove']);
			/**
			 * Add logo login...
			 */
			add_action('login_head', [$this, 'raf_custom_login_logo']);
			/**
			 * Custom template redirect...
			 */
			add_action('template_redirect', [$this, 'raf_template_redirect']);
			/**
			 * --------------------------------------------------------------------------
			 * End hook action...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * --------------------------------------------------------------------------
			 * Default hook filter...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Change login logo url...
			 */
			add_filter('login_headerurl', [$this, 'raf_custom_login_logo_url']);
			/**
			 * Change login logo title...
			 */
			add_filter('login_headertitle', [$this, 'raf_custom_login_logo_title']);
			/**
			 * Change footer text in back_office...
			 */
			add_filter('admin_footer_text', [$this, 'raf_change_footer_text']);
			/**
			 * Remove wp help bar...
			 */
			add_filter('contextual_help', [$this, 'raf_remove_help_bar'], 999, 3);
			/**
			 * Remove version styles...
			 */
			add_filter('style_loader_src', [$this, 'raf_remove_wp_ver_css_js'], 15, 1);
			/**
			 * Remove version scripts...
			 */
			add_filter('script_loader_src', [$this, 'raf_remove_wp_ver_css_js'], 15, 1);
			/**
			 * Add slug class...
			 */
			// add_filter('body_class', [$this, 'raf_add_slug_to_body_class'));
			/**
			 * Add upload file type...
			 */
			add_filter('upload_mimes', [$this, 'raf_mime_types'], 1, 1);
			/**
			 * Add Timber context...
			 */
			add_filter('timber_context', [$this, 'raf_add_to_context']);
			/**
			 * Add twig functions...
			 */
			add_filter('get_twig', [$this, 'raf_add_to_twig']);
			/**
			 * Rewrite url...
			 */
			add_filter('wpseo_json_ld_search_url', [$this, 'raf_rewrite']);
			/**
			 * --------------------------------------------------------------------------
			 * End hook filter...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * --------------------------------------------------------------------------
			 * Setup permission with normal user...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Permission with normal user...
			 */
			if (!current_user_can('manage_options')) {
				/**
				 * Modify admin menu...
				 */
				add_action('admin_menu', [$this, 'raf_modify_menus']);
				/**
				 * Modify dashboard block...
				 */
				add_action('wp_dashboard_setup', [$this, 'raf_remove_dashboard_widgets']);
				/**
				 * Disable admin bar...
				 */
				add_filter('show_admin_bar', '__return_false');
			}
			/**
			 * --------------------------------------------------------------------------
			 * End setup...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * --------------------------------------------------------------------------
			 * Optimization...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Disable XML-RPC...
			 */
			add_filter('xmlrpc_enabled', '__return_false');
			/**
			 * Disable JSON REST API...
			 */
			add_filter('json_enabled', '__return_false');
			add_filter('json_jsonp_enabled', '__return_false');
			/**
			 * Remove generation in header...
			 */
			remove_action('wp_head', 'wp_generator');
			/**
			 * Remove welcome panel...
			 */
			remove_action('welcome_panel', 'wp_welcome_panel');
			/**
			 * Enable shortcodes in text widgets...
			 */
			// add_filter('widget_text', 'do_shortcode');
			/**
			 * Remove extra feed...
			 */
			remove_action('wp_head', 'feed_links_extra', 3);
			/**
			 * Remove the link to the Really Simple Discovery service endpoint...
			 */
			remove_action('wp_head', 'rsd_link');
			/**
			 * Remove the link to the Windows Live Writer manifest file...
			 */
			remove_action('wp_head', 'wlwmanifest_link');
			/**
			 * Remove relational links for the posts adjacent to the current post for single post pages...
			 */
			remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
			/**
			 * Remove rel=shortlink into the head if a shortlink is defined for the current page...
			 */
			remove_action('wp_head', 'wp_shortlink_wp_head', 10);
			/**
			 * Remove inline Emoji detection script...
			 */
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			/**
			 * Remove Emoji styles...
			 */
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action('admin_print_styles', 'print_emoji_styles');
			/**
			 * Remove oEmbed discovery links...
			 */
			remove_action('wp_head', 'wp_oembed_add_discovery_links');
			/**
			 * Remove scripts embedded iframes...
			 */
			remove_action('wp_head', 'wp_oembed_add_host_js');
			/**
			 * Remove REST API link tag...
			 */
			remove_action('wp_head', 'rest_output_link_wp_head', 10);
			/**
			 * Remove convert emoji to a static img element...
			 */
			remove_filter('the_content_feed', 'wp_staticize_emoji');
			remove_filter('comment_text_rss', 'wp_staticize_emoji');
			/**
			 * Remove convert emoji in emails into static images...
			 */
			remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
			/**
			 * Remove default gallery styles...
			 */
			add_filter('use_default_gallery_style', '__return_false');
			/**
			 * Remove Emoji url...
			 */
			add_filter('emoji_svg_url', '__return_false');
			/**
			 * Disable comment widgets style..
			 */
			add_filter('show_recent_comments_widget_style', '__return_false');
			/**
			 * --------------------------------------------------------------------------
			 * End Optimization...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * --------------------------------------------------------------------------
			 * Special project...
			 * --------------------------------------------------------------------------
			 */
			/**
			 * Ajax...
			 */
			// add_action('wp_ajax_raf_example', [$this, 'raf_example']);
			// add_action('wp_ajax_nopriv_raf_example', [$this, 'raf_example']);

			/**
			 * Enable ACF's options page...
			 */
			if (function_exists('acf_add_options_page')) {
				acf_add_options_page();
			}
			/**
			 * --------------------------------------------------------------------------
			 * End special project...
			 * --------------------------------------------------------------------------
			 */

			/**
			 * Flush rewrite...
			 */
			flush_rewrite_rules();

			parent::__construct();
		}

		/**
		 * Load theme...
		 */
		public function raf_theme_load()
		{
		}

		/**
		 * Theme setup...
		 */
		public function raf_theme_setup()
		{
			/**
			 * Register custom post type and taxonomy...
			 */
			load_template(RAF_BASE . '/inc/raf-custom-register.php');
			/**
			 * Load text domain...
			 */
			load_theme_textdomain(RAF_DOMAIN, RAF_BASE . '/languages');
			/**
			 * Register menu...
			 */
			register_nav_menus([
				'header-menu' => __('Header menu', RAF_DOMAIN),
				'footer-menu' => __('Footer menu', RAF_DOMAIN),
			]);
		}

		/**
		 * Enqueue styles...
		 */
		public function raf_load_styles()
		{
			if (!is_admin()) {
				wp_enqueue_style('main', RAF_URL . '/assets/css/app.min.css', [], false, 'all');
			}
		}

		/**
		 * Enqueue scripts...
		 */
		public function raf_load_scripts()
		{
			if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
				wp_enqueue_script('jquery');
				wp_enqueue_script('main', RAF_URL . '/assets/js/app.min.js', ['jquery'], false, true);
			}
			/**
			 * Comment reply...
			 */
			if (is_singular() && comments_open() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
			/**
			 * Load ajax...
			 */
			wp_localize_script('jquery', 'raf_ajax', ['ajax_url' => admin_url('admin-ajax.php')]);
			/**
			 * Move scripts to footer...
			 */
			remove_action('wp_head', 'wp_print_scripts');
			remove_action('wp_head', 'wp_print_head_scripts', 9);
			remove_action('wp_head', 'wp_enqueue_scripts', 1);
		}

		/**
		 * Modify widgets...
		 */
		public function raf_modify_default_widgets()
		{
			/**
			 * Remove default widget...
			 */
			unregister_widget('WP_Widget_Pages');
			unregister_widget('WP_Widget_Calendar');
			unregister_widget('WP_Widget_Archives');
			unregister_widget('WP_Widget_Meta');
			unregister_widget('WP_Widget_Search');
			unregister_widget('WP_Widget_Text');
			unregister_widget('WP_Widget_Categories');
			unregister_widget('WP_Widget_Recent_Posts');
			unregister_widget('WP_Widget_Recent_Comments');
			unregister_widget('WP_Widget_RSS');
			unregister_widget('WP_Widget_Tag_Cloud');
			unregister_widget('WP_Nav_Menu_Widget');
			/**
			 * Register sidebar...
			 */
			/*register_sidebar([
                'name'          => __('', RAF_DOMAIN),
                'id'            => '',
                'description'   => __('', RAF_DOMAIN),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ]);*/

			/**
			 * Register widgets.
			 */
			// register_widget('WP_Widget_Rafadiot');
		}

		/**
		 * Remove logo on admin bar...
		 */
		public function raf_wp_admin_bar_remove()
		{
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');
		}

		/**
		 * Change login logo...
		 */
		public function raf_custom_login_logo()
		{
			echo "<style type='text/css'>
                .login h1 a {
                    background-image: url('" . get_theme_file_uri('/assets/images/login-logo.png') . "');
                    background-size: 280px 78px;
                    width: 280px;
                    height: 78px;
                }
            </style>";
		}

		/**
		 * Custom template redirect...
		 */
		function raf_template_redirect()
		{
			global $wp_rewrite;

			if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->get_search_permastruct()) {
				return;
			}

			$search_base = $wp_rewrite->search_base;

			if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false && strpos($_SERVER['REQUEST_URI'], '&') === false) {
				wp_redirect(get_search_link());
				exit();
			}
		}

		/**
		 * Add logo login url...
		 *
		 * @return string
		 */
		public function raf_custom_login_logo_url()
		{
			return RAF_AUTHOR_URL;
		}

		/**
		 * Add logo login title...
		 *
		 * @return string|void
		 */
		public function raf_custom_login_logo_title()
		{
			return get_bloginfo('name');
		}

		/**
		 * Change text footer in back_office...
		 */
		public function raf_change_footer_text()
		{
			echo 'Powered by <a href="' . RAF_AUTHOR_URL . '" target="_blank">' . RAF_AUTHOR . '</a>';
		}

		/**
		 * Remove help bar...
		 *
		 * @param $old_help
		 * @param $screen_id
		 * @param $screen
		 * @return mixed
		 */
		public function raf_remove_help_bar($old_help, $screen_id, $screen)
		{
			$screen->remove_help_tabs();
			return $old_help;
		}

		/**
		 * Remove version number...
		 *
		 * @param $src
		 * @return string
		 */
		public function raf_remove_wp_ver_css_js($src)
		{
			return $src ? esc_url(remove_query_arg('ver', $src)) : false;
		}

		/**
		 * Add format upload files...
		 *
		 * @param $mime_types
		 * @return mixed
		 */
		public function raf_mime_types($mime_types)
		{
			$mime_types['svg'] = 'image/svg+xml';
			return $mime_types;
		}

		/**
		 * Add variables for Timber...
		 *
		 * @param $context
		 * @return mixed
		 */
		public function raf_add_to_context($context)
		{
			/**
			 * Header menu...
			 */
			if (has_nav_menu('header-menu')) {
				$context['header_menu'] = new Timber\Menu('header-menu', ['depth' => self::RAF_DEPTH]);
			}
			/**
			 * Footer menu...
			 */
			if (has_nav_menu('footer-menu')) {
				$context['footer_menu'] = new Timber\Menu('footer-menu', ['depth' => self::RAF_DEPTH]);
			}
			/**
			 * Options data...
			 */
			if (function_exists('get_fields')) {
				$context['option'] = get_fields('options');
			}
			/**
			 * Text domain...
			 */
			$context['rafadiot'] = RAF_DOMAIN;

			return $context;
		}

		/**
		 * Add function for twig...
		 *
		 * @param $twig
		 * @return mixed
		 */
		public function raf_add_to_twig($twig)
		{
			$twig->addExtension(new \Twig\Extension\StringLoaderExtension());

			return $twig;
		}

		/**
		 * Rewrite url...
		 *
		 * @param $url
		 * @return mixed
		 */
		function raf_rewrite($url)
		{
			/**
			 * Rewrite search url...
			 */
			return str_replace('/?s=', '/search/', $url);
		}

		/**
		 * Modify menu for editor...
		 */
		public function raf_modify_menus()
		{
			remove_menu_page('edit-comments.php');
			remove_menu_page('themes.php');
			remove_submenu_page('themes.php', 'themes.php');
			remove_submenu_page('themes.php', 'customize.php');
			remove_menu_page('plugins.php');
			remove_menu_page('users.php');
			remove_menu_page('tools.php');
			remove_menu_page('options-general.php');
		}

		/**
		 * Remove dashboard widgets...
		 */
		public function raf_remove_dashboard_widgets()
		{
			global $wp_meta_boxes;
			//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
			//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		}

		/**
		 * Ajax...
		 */
		public function raf_example()
		{
			$result = [
				'status' => 1,
				'messages' => 'Success',
				'data' => ''
			];

			wp_send_json($result, 200);
			exit();
		}
	}

	new Rafadiot();
}
