<?php
namespace Carawebs\LandingPage\Main;

/**
 * @see http://www.wpexplorer.com/wordpress-page-templates-plugin/
 */

class Templates {

  /**
  * A reference to an instance of this class.
  */
  private static $instance;

  /**
  * The array of templates that this plugin tracks.
  */
  protected $templates;

  /**
  * Initializes the plugin by setting filters and administration functions.
  */
  public function __construct() {

    $this->templates = array();

    var_dump( \plugin_dir_path() . 'Views/templates/landing-page-template.php');

    // Add your templates to this array.
    $this->templates = array(

      dirname( __FILE__ ) . 'Views/templates/landing-page-template.php' => 'Landing Page'

    );

  }


  /**
  * Adds our template to the pages cache in order to trick WordPress
  * into thinking the template file exists where it doesn't really exist.
  *
  */
  public function register_project_templates( $atts ) {

    // Create the key used for the themes cache
    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    // Retrieve the cache list. If it doesn't exist, or it's empty prepare an array
    $templates = wp_get_theme()->get_page_templates();

    if ( empty( $templates ) ) {

    $templates = array();

    }

    // New cache, therefore remove the old one
    wp_cache_delete( $cache_key , 'themes');

    // Add template to the list of templates by merging our templates with the existing templates array from the cache.
    $templates = array_merge( $templates, $this->templates );

    // Add the modified cache to allow WordPress to pick it up for listing available templates
    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

    return $atts;

  }

  /**
  * Checks if the template is assigned to the page
  */
  public function view_project_template( $template ) {

    global $post;

    if ( !isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {

    return $template;

    }

    $file = plugin_dir_path(__FILE__) . get_post_meta( $post->ID, '_wp_page_template', true );

    // Just to be safe, we check if the file exist first
    if( file_exists( $file ) ) {

      return $file;

    }

    else {

      echo $file;

    }

    return $template;

  }

}

//add_action( 'plugins_loaded', array( 'Templates', 'get_instance' ) );
