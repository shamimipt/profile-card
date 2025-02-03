<?php
/**
 * profile card class
 *
 * @package Profile Card
 * @author ThemesTransmit
 * @version 1.0
 */

use Elementor\Widgets_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

if ( ! class_exists( 'Profile_Card' ) ) {
	/**
	 * Class Profile_Card
	 */
	class Profile_Card {

		/**
		 * Singleton class instance.
		 *
		 * @var Profile_Card
		 */
		protected static $instance;

		/**
		 * Create & return singleton instance of this class.
		 *
		 * @return Profile_Card
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Profile_Card constructor.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->init();
		}

		/**
		 * Initialize the plugin
		 *
		 * @return void
		 */
		private function init() {

			add_action( 'init', [ $this, 'localization' ] );

			add_action( 'elementor/elements/categories_registered', [ $this, 'pc_widget_categories' ], PHP_INT_MIN );

			add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

			add_action( 'elementor/frontend/before_enqueue_styles', [ $this,'register_style'] );

		}

		/**
		 * Load plugin Localization
		 */
		public function localization() {
			load_plugin_textdomain( 'profile-card', false, basename( dirname( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Register Styles
		 *
		 * Load required plugin core files.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function register_style() {
			wp_register_style('style', PC_CORE_ASSETS . 'css/profile-card-widget.css', '', '1.0', 'all');
			wp_enqueue_style('style');
		}

		/**
		 * Register Widgets
		 *
		 * Register new Elementor widgets.
		 *
		 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
		 *
		 * @since 1.2.0
		 * @access public
		 *
		 */
		public function register_widgets( $widgets_manager ) {

			require_once PC_CORE_PATH . 'widgets/profile-card-widget.php';

			$widgets_manager->register( new Profile_Card_Widget() );

		}

		/**
		 * Register Category
		 *
		 * @param $elements_manager
		 */
		public function pc_widget_categories( $elements_manager ) {

			$categories = [];

			$categories['extrawidgets'] = [
				'title' => esc_html__('Extra Widgets', 'profile-card'),
				'icon' => 'fa fa-plug',
			];

			$old_categories = $elements_manager->get_categories();
			$categories = array_merge( $categories, $old_categories );

			$set_categories = function ( $categories ) {
				$this->categories = $categories;
			};

			$set_categories->call( $elements_manager, $categories );

		}

	}
}
// End of file class-profile-card.php.