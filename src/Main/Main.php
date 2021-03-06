<?php
namespace Carawebs\LandingPage\Main;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Carawebs_Plugin_Boilerplate
 * @subpackage Carawebs_Plugin_Boilerplate/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Carawebs_Plugin_Boilerplate
 * @subpackage Carawebs_Plugin_Boilerplate/public
 * @author     Your Name <email@example.com>
 */
class Main {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $LandingPage    The ID of this plugin.
	 */
	private $LandingPage;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $LandingPage       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $LandingPage, $version ) {

		$this->LandingPage = $LandingPage;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Carawebs_Plugin_Boilerplate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Carawebs_Plugin_Boilerplate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->LandingPage, plugin_dir_url( __FILE__ ) . 'css/LandingPage-public.css', array(), $this->version, 'all' );

	}

		/**
	 * Register_shortcodes
	 *
	 * @since		1.0.0
	 *
	 */
	public function register_shortcodes() {

		add_shortcode( 'landing_page', array($this, 'landing_page_markup' ) );
		//add_shortcode( 'addressCTA', array( $this, 'CTA_shortcode') );

	}

	/**
	 * Define basic shortcode for the landing page.
	 *
	 * Callback function returning address HTML to the `add_shortcode` hook.
	 *
	 * @since		1.0.0
	 * @param  [type] $atts [description]
	 * @return string Returns the address as a HTML block
	 */
	public static function landing_page_markup( ){

		$address = self::get_html();

		return apply_filters( 'carawebs_landing_page_html', $address );

	}

	public static function get_html() {

		ob_start();

		?>
		<div class="wrapper">
			<h1>Hello</h1>
			<h3>Testing...</h3>
			<hr>
		</div>
		<?php
		echo ob_get_clean();

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Carawebs_Plugin_Boilerplate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Carawebs_Plugin_Boilerplate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->LandingPage, plugin_dir_url( __FILE__ ) . 'js/LandingPage-public.js', array( 'jquery' ), $this->version, false );

	}

}
