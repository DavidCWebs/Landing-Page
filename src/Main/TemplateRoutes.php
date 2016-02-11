<?php
namespace Carawebs\LandingPage\Main;

class TemplateRoutes {

  public function override_page_template( $page_template ) {

    $landing_pages = [

      'services'

    ];

    if( is_page ( $landing_pages ) ) {

      $page_template = plugin_dir_path( dirname( __FILE__ ) ) . 'Views/templates/landing-page.php';

    }

    return $page_template;

  }

}
