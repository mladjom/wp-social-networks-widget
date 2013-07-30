<?php
/*
Plugin Name: WP Social Networks Widget
Description:  Displays Font Awesome Icons of social network sites that linkback to social network profiles. 
Plugin URI: http://www.divinedeveloper.com/projects/wp-social-networks-widget/
Author: Mladjo
Version: 1.1
Author URI: http://www.divinedeveloper.com/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//check if class exist
if ( !class_exists('WPSocialNetworksWidget') ) {

class WPSocialNetworksWidget extends WP_Widget {
	
	protected $version = '1.0.0';

	protected $plugin_slug = 'wp_social_networks_widget'; 
			
	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	* Specifies the classname and description, instantiates the widget,
	* loads localization files, and includes necessary stylesheets and JavaScript.
	*/
	public function __construct() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->plugin_slug, 'description' =>__('Link to your social network profiles.', $this->plugin_slug ));

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => $this->plugin_slug );

		/* Create the widget. */
		$this->WP_Widget( $this->plugin_slug, __('WP Social Networks', $this->plugin_slug), $widget_ops, $control_ops );
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		}

		// Add support for translations
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
	
	}// end constructor
 

	/**
	* Load the plugin text domain for translation.
	*
	* @since 1.1.0
	*/
	public function load_plugin_textdomain() {
	
	$domain = $this->plugin_slug;
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	
	load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
	load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}


	/**
	* Register and enqueue public-facing style sheet.
	*
	* @since 1.0.0
	*/
	public function enqueue_styles() {
  	wp_enqueue_style('font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.css', false, null);
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/app.css', __FILE__ ), array(), $this->version );
	}


		/*--------------------------------------------------*/
		/* Form
		/*--------------------------------------------------*/ 
		/**
		* Generates the administration form for the widget.
		*
		* @param array instance The array of keys and values for the widget.
		*/
		public function form( $instance ) {
	 	// outputs the options form on admin

		/* Set up some default widget settings. */
		/* Make sure all keys are added here, even with empty string values. */
		$defaults = array(
			'title' => '',

			'twitter'  => '',		
			'facebook' => '',	
			'flickr' => '',			
			'feed' => '',	
			'linkedin' => '',	
			'google' => '',	
			'github' => '',	
			'youtube' => '',	
			'bitbucket' => '',	
			'instagram' => '',	
			'pinterest' => '',	
		
			'twitter_label' => '',	
			'facebook_label' => '',	
			'flickr_label' => '',	
			'feed_label' => '',	
			'linkedin_label' => '',	
			'google_label' => '',		
			'github_label' => '',		
			'youtube_label' => '',	
			'bitbucket_label' => '',	
			'instagram_label' => '',	
			'pinterest_label' => '',	

			'display' => 'icons',			
			'vertical' => 'vertical',		
			'size'  => '3x',	

		);

		$instance = wp_parse_args( (array) $instance, $defaults );


			// Display the admin form
			include( plugin_dir_path(__FILE__) . '/views/admin.php' );

		} // end form


		/**
		 * Get an array of the available display options.
		 * @return array
		 */
		protected function get_display_options () {
			return array(
						'icons' => __( 'Icons', $this->plugin_slug ),
						'labels' => __( 'Labels', $this->plugin_slug ),
						'both' => __( 'Both', $this->plugin_slug ),

						);
		} // End get_display_options()
		/**
		 * Get an array of the available size options.
		 * @return array
		 */
		protected function get_size_options () {
			return array(
						'large' => __( 'Large', $this->plugin_slug ),
						'2x' => __( '2X', $this->plugin_slug ),
						'3x' => __( '3X', $this->plugin_slug ),
						'4x' => __( '4X', $this->plugin_slug ),
						'5x' => __( '5X', $this->plugin_slug ),
						);
		} // End get_size_options()


		/*--------------------------------------------------*/
		/* Update
		/*--------------------------------------------------*/ 
		/**
		* Processes the widget's options to be saved.
		*
		* @param array new_instance The previous instance of values before the update.
		* @param array old_instance The new instance of values to be generated via the update.
		*/
		public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['feed'] = $new_instance['feed'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['google'] = $new_instance['google'];
		$instance['github'] = $new_instance['github'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['bitbucket'] = $new_instance['bitbucket'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['pinterest'] = $new_instance['pinterest'];
		
		$instance['twitter_label'] = $new_instance['twitter_label'];
		$instance['facebook_label'] = $new_instance['facebook_label'];
		$instance['flickr_label'] = $new_instance['flickr_label'];
		$instance['feed_label'] = $new_instance['feed_label'];
		$instance['linkedin_label'] = $new_instance['linkedin_label'];
		$instance['google_label'] = $new_instance['google_label'];
		$instance['github_label'] = $new_instance['github_label'];
		$instance['youtube_label'] = $new_instance['youtube_label'];
		$instance['bitbucket_label'] = $new_instance['bitbucket_label'];
		$instance['instagram_label'] = $new_instance['instagram_label'];
		$instance['pinterest_label'] = $new_instance['pinterest_label'];

		/* The select box is returning a text value, so we escape it. */
		$instance['display'] = esc_attr($new_instance['display']);
		$instance['size'] = esc_attr($new_instance['size']);

		$instance['vertical'] = $new_instance['vertical'];

		return $instance;
		} // End update()


 
		/*--------------------------------------------------*/
		/* Display
		/*--------------------------------------------------*/

		/**
		* Outputs the content of the widget.
		*
		* @param array args The array of form elements
		* @param array instance The current instance of the widget
		*/
		public function widget( $args, $instance ) {

			extract( $args, EXTR_SKIP );

			/* Before widget (defined by themes). */
			echo $before_widget;

			include( plugin_dir_path( __FILE__ ) . '/views/widget.php' );
			
			// After widget (defined by themes). */
			echo $after_widget;

		} // end widget

 
} // end class


add_action( 'widgets_init', create_function( '', 'register_widget("WPSocialNetworksWidget");' ) );

}