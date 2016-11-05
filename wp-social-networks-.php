<?php
/*
  Plugin Name: WP Social Networks Widget
  Description:  Displays Icons of social network sites that linkback to social network profiles.
  Plugin URI: http://milentijevic.com/wp-social-networks-widget/
  Author: Mladjo
  Version: 2.0.1
  Author URI: http://milentijevic.com/
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly



    
//check if class exist
if (!class_exists('WPSocialNetworksWidget')) {

    class WPSocialNetworksWidget extends WP_Widget {

        protected $widget_version = '2.0.0';
        protected $widget_slug = 'wpsnw';

        /* -------------------------------------------------- */
        /* Constructor
          /*-------------------------------------------------- */

        /**
         * Specifies the classname and description, instantiates the widget,
         * loads localization files, and includes necessary stylesheets and JavaScript.
         */
        public function __construct() {

            parent::__construct(
                    $this->get_widget_slug(), __('WP Social Networks', $this->get_widget_slug()), array(
                'classname' => $this->get_widget_slug() . '-class',
                'description' => __('Link to your social network profiles.', $this->get_widget_slug())
                    ), array(
                'width' => 600,
                    )
            );

            add_action('init', array($this, 'load_widget_textdomain'));

            if (is_active_widget(false, false, $this->id_base)) {
                add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
            }

            // Add support for translations
        }

        /**
         * Return the widget version.
         *
         * @since 2.0.0
         *
         * @return Plugin version variable.
         */
        public function get_widget_version() {
            return $this->widget_version;
        }

        /**
         * Return the widget slug.
         *
         * @since 2.0.0
         *
         * @return Plugin slug variable.
         */
        public function get_widget_slug() {
            return $this->widget_slug;
        }

        /**
         * Load the plugin text domain for translation.
         *
         * @since 1.1.0
         */
        public function load_widget_textdomain() {

            load_plugin_textdomain($this->get_widget_slug(), false, plugin_dir_path(__FILE__) . 'lang/');
        }

        /**
         * Register and enqueue public-facing style sheet.
         *
         * @since 1.0.0
         */
        public function enqueue_styles() {
            wp_enqueue_style($this->get_widget_slug() . '-styles', plugins_url('assets/css/app.css', __FILE__), array(), $this->get_widget_version());
        }

        /* -------------------------------------------------- */
        /* Form
          /*-------------------------------------------------- */

        /**
         * Get an array of the available social options.
         * @return array
         * @since 2.0.0
         */
        protected function get_social_networks() {
            return array(
                'facebook' => array(
                    'icon' => 'facebook',
                    'label' => '',
                    'url' => ''
                ),
                'linkedin' => array(
                    'icon' => 'linkedin',
                    'label' => '',
                    'url' => ''
                ),
                'twitter' => array(
                    'icon' => 'twitter',
                    'label' => '',
                    'url' => ''
                ),
                'google-plus' => array(
                    'icon' => 'google-plus',
                    'label' => '',
                    'url' => ''
                ),
                'youtube' => array(
                    'icon' => 'youtube',
                    'label' => '',
                    'url' => ''
                ),
                'instagram' => array(
                    'icon' => 'instagram',
                    'label' => '',
                    'url' => ''
                ),
                'github' => array(
                    'icon' => 'github',
                    'label' => '',
                    'url' => ''
                ),
                'rss' => array(
                    'icon' => 'rss',
                    'label' => '',
                    'url' => ''
                ),
                'pinterest' => array(
                    'icon' => 'pinterest',
                    'label' => '',
                    'url' => ''
                ),
                'flickr' => array(
                    'icon' => 'flickr',
                    'label' => '',
                    'url' => ''
                ),
                'bitbucket' => array(
                    'icon' => 'bitbucket',
                    'label' => '',
                    'url' => ''
                ),
                'tumblr' => array(
                    'icon' => 'tumblr',
                    'label' => '',
                    'url' => ''
                ),
                'dribbble' => array(
                    'icon' => 'dribbble',
                    'label' => '',
                    'url' => ''
                ),
                'vimeo' => array(
                    'icon' => 'vimeo',
                    'label' => '',
                    'url' => ''
                ),
                'wordpress' => array(
                    'icon' => 'wordpress',
                    'label' => '',
                    'url' => ''
                ),
                'reddit' => array(
                    'icon' => 'reddit',
                    'label' => '',
                    'url' => ''
                ),
                'stumbleupon' => array(
                    'icon' => 'stumbleupon',
                    'label' => '',
                    'url' => ''
                ),
                'delicious' => array(
                    'icon' => 'delicious',
                    'label' => '',
                    'url' => ''
                ),
                'digg' => array(
                    'icon' => 'digg',
                    'label' => '',
                    'url' => ''
                ),
                'behance' => array(
                    'icon' => 'behance',
                    'label' => '',
                    'url' => ''
                ),
            );
        }

        /**
         * Get an array of the available display options.
         * @return array
         */
        protected function get_display_options() {
            return array(
                'icons' => __('Icons', 'wpsnw'),
                'labels' => __('Labels', 'wpsnw'),
                'both' => __('Both', 'wpsnw'),
            );
        }

        /**
         * Get an array of the available size options.
         * @return array
         */
        protected function get_size_options() {
            return array(
                'wpsnw-lg' => __('Large', 'wpsnw'),
                'wpsnw-2x' => __('2X', 'wpsnw'),
                'wpsnw-3x' => __('3X', 'wpsnw'),
                'wpsnw-4x' => __('4X', 'wpsnw'),
                'wpsnw-5x' => __('5X', 'wpsnw'),
            );
        }

// End get_size_options()
        /**
         * Generates the administration form for the widget.
         *
         * @param array instance The array of keys and values for the widget.
         */
        public function form($instance) {
            // outputs the options form on admin

            /* Set up some default widget settings. */
            /* Make sure all keys are added here, even with empty string values. */
            $defaults = array(
                'title' => '',
                'social_networks' => '',
                'display' => 'icons',
                'size' => 'wpsnw-3x',
                'vertical' => 'vertical',
                'new_window' => 'no',
                'css' => '',
            );

            $instance = wp_parse_args((array) $instance, $defaults);

            include( plugin_dir_path(__FILE__) . '/views/admin.php' );
        }

        /* -------------------------------------------------- */
        /* Update
          /*-------------------------------------------------- */

        /**
         * Processes the widget's options to be saved.
         *
         * @param array new_instance The previous instance of values before the update.
         * @param array old_instance The new instance of values to be generated via the update.
         */
        public function update($new_instance, $old_instance) {

            $instance = $old_instance;

            /* Strip tags for title and name to remove HTML (important for text inputs). */
            $instance['title'] = strip_tags($new_instance['title']);

            $instance['social_networks'] = $new_instance['social_networks'];

            /* The select box is returning a text value, so we escape it. */
            $instance['display'] = esc_attr($new_instance['display']);
            $instance['size'] = esc_attr($new_instance['size']);

            $instance['vertical'] = $new_instance['vertical'];
            $instance['new_window'] = $new_instance['new_window'];
            $instance['css'] = $new_instance['css'];

            return $instance;
        }

// End update()


        /* -------------------------------------------------- */
        /* Display
          /*-------------------------------------------------- */

        /**
         * Outputs the content of the widget.
         *
         * @param array args The array of form elements
         * @param array instance The current instance of the widget
         */
        public function widget($args, $instance) {

            extract($args, EXTR_SKIP);

            /* Before widget (defined by themes). */
            echo $before_widget;

            include( plugin_dir_path(__FILE__) . '/views/widget.php' );

            // After widget (defined by themes). */
            echo $after_widget;
        }

// end widget
    }

    // end class


    add_action('widgets_init', create_function('', 'register_widget("WPSocialNetworksWidget");'));
}