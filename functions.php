<?php

/**
 * pobrefobia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pobrefobia
 */

if (!defined('GEN_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('GEN_VERSION', '0.1.0');
}

if (!defined('GEN_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `gen_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'GEN_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('gen_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gen_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'Header' => __('Top', 'pobrefobia'),
				'Footer' => __('Bottom', 'pobrefobia'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'gen_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gen_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Footer', 'pobrefobia'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your footer.', 'pobrefobia'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'gen_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gen_scripts()
{
	wp_enqueue_style('pobrefobia-style', get_stylesheet_uri(), array(), GEN_VERSION);
	wp_enqueue_script('pobrefobia-script', get_template_directory_uri() . '/js/script.min.js', array(), GEN_VERSION, true);
	wp_enqueue_script('flowbite-script', '/wp-content/themes/pobrefobia/node_modules/flowbite/dist/flowbite.min.js', array(), GEN_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'gen_scripts');

/**
 * Enqueue the block editor script.
 */
function gen_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'pobrefobia-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		GEN_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'gen_enqueue_block_editor_script');

/**
 * Create a JavaScript array containing the Tailwind Typography classes from
 * GEN_TYPOGRAPHY_CLASSES for use when adding Tailwind Typography support
 * to the block editor.
 */
function gen_admin_scripts()
{
	?>
	<script>
		tailwindTypographyClasses = '<?php echo esc_attr(GEN_TYPOGRAPHY_CLASSES); ?>'.split(' ');
	</script>
	<?php
}
add_action('admin_print_scripts', 'gen_admin_scripts');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function gen_tinymce_add_class($settings)
{
	$settings['body_class'] = GEN_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'gen_tinymce_add_class');

/**
 * Get the estimated reading time for a post.
 *
 * @param int $words_per_minute The average reading speed in words per minute. Default is 200.
 * @return string The estimated reading time in minutes.
 */
function get_the_reading_time($words_per_minute = 200)
{
	$content = get_post_field('post_content', get_the_ID());
	$word_count = str_word_count(strip_tags($content));
	$reading_time = ceil($word_count / $words_per_minute);

	return $reading_time . ' min';
}

// Remove unnecessary scripts and styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// Function to generate the copy button HTML
function generate_copy_button($url)
{
	ob_start();
	?>
	<a class="copy-post-url" href="<?php echo esc_url($url); ?>">
		<button
			class="inline-flex items-center justify-center rounded-3xl text-sm font-medium disabled:opacity-50 disabled:pointer-events-none border bg-accent h-10 py-2 px-4 hover:opacity-90 transition-opacity">
			<span>Copiar</span>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
				<rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
				<path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
			</svg>
		</button>
	</a>

	<script>
		const copyButtons = document.querySelectorAll('.copy-post-url');

		copyButtons.forEach(button => {
			button.addEventListener('click', event => {
				event.preventDefault();
				const postUrl = event.currentTarget.getAttribute('href');
				copyToClipboard(postUrl);

				// Change button text to "Copiado!" after copying
				const buttonText = event.currentTarget.querySelector('span');
				buttonText.textContent = 'Copiado';

				// Add opacity-50 class temporarily
				event.currentTarget.classList.add('opacity-50');	
				event.currentTarget.classList.add('pointer-events-none');				
			});
		});

		function copyToClipboard(text) {
			const textField = document.createElement('textarea');
			textField.value = text;
			document.body.appendChild(textField);
			textField.select();
			document.execCommand('copy');
			textField.remove();

			// Perform any additional actions or provide feedback to the user if needed
			console.log('URL copied to clipboard: ' + text);
		}

	</script>

	<?php
	return ob_get_clean();
}

// Function to generate the WhatsApp button HTML
function share_post_to_whatsapp()
{
	$post_title = get_the_title();
	$post_excerpt = get_the_excerpt();
	$post_url = get_permalink();

	// Format the title and excerpt for WhatsApp chat
	$formatted_title = '*' . $post_title . "*";
	$formatted_excerpt = '_' . $post_excerpt . '_';
	$formatted_url = '*Link:* ' . $post_url;
	$formatted_text = "{$formatted_title}\n{$formatted_excerpt}\n\n{$formatted_url}";

	// Encode the formatted text for the WhatsApp URL
	$encoded_text = urlencode($formatted_text);

	// Generate the WhatsApp share URL
	$whatsapp_url = 'https://wa.me/?text=' . $encoded_text;

	// Output the WhatsApp button HTML
	echo '<a target="_blank" href="' . $whatsapp_url . '">';
	echo '<button class="inline-flex items-center justify-center rounded-3xl text-sm font-medium disabled:opacity-50 disabled:pointer-events-none border bg-accent h-10 py-2 px-4 hover:opacity-90 transition-opacity">';
	echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">';
	echo '<polyline points="15 17 20 12 15 7" />';
	echo '<path d="M4 18v-2a4 4 0 0 1 4-4h12" />';
	echo '</svg>';
	echo '</button>';
	echo '</a>';
}