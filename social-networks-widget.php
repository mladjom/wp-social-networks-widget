<?php
/*
Plugin Name: Social Networks Widget
Description:  Display Font Awesome Icons of social network sites that linkback to social network profiles. 
Plugin URI: http://www.divinedeveloper.com/plugins/social-network-widget/
Author: Mladen Milentijevic
Version: 1.0
Author URI: http://www.divinedeveloper.com/
*/

// Register widget with wordpress widgets_init hook
add_action('widgets_init', 'social_networks_widget_register');
function social_networks_widget_register() {
	register_widget('SocialNetworksWidget');
}

if ( !class_exists('SocialNetworksWidget') ) {

class SocialNetworksWidget extends WP_Widget {



	function SocialNetworksWidget() {

		$widget_ops = array('classname' => 'social_networks_widget', 'description' => __('Link to your social network profiles.', 'social_networks_widget' ));

		$this->WP_Widget('social_networks_widget', __('Social Networks', 'social_networks_widget'), $widget_ops, $control_ops);
		

		/* Widget control settings. */
		$control_ops = array( 'width' => 350, 'height' => 350, 'id_base' => 'social_networks_widget' );

		if ( is_active_widget(false, false, $this->id_base) ){
				add_action( 'wp_print_styles', array(&$this, 'add_style') );

		}

	}


	function add_style() {
  	wp_enqueue_style('wpbootstrap_font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.css', false, null);
   	wp_enqueue_style( 'social_networks_widget', plugins_url('assets/app.css', __FILE__) );
	}

	function widget( $args, $instance ) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title']);


		$networks['Twitter']['link'] = $instance['twitter'];

		$networks['Facebook']['link'] = $instance['facebook'];

		$networks['Flickr']['link'] = $instance['flickr'];

		$networks['RSS']['link'] = $instance['feed'];

		$networks['Linkedin']['link'] = $instance['linkedin'];

		$networks['Google-Plus']['link'] = $instance['google'];

		$networks['Github']['link'] = $instance['github'];

		$networks['Youtube']['link'] = $instance['youtube'];

		

		$networks['Twitter']['label'] = $instance['twitter_label'];

		$networks['Facebook']['label'] = $instance['facebook_label'];

		$networks['Flickr']['label'] = $instance['flickr_label'];

		$networks['RSS']['label'] = $instance['feed_label'];

		$networks['Linkedin']['label'] = $instance['linkedin_label'];

		$networks['Google-Plus']['label'] = $instance['google_label'];

		$networks['Github']['label'] = $instance['github_label'];

		$networks['Youtube']['label'] = $instance['youtube_label'];



		$display = $instance['display'];

		$vertical = $instance['vertical'];
		

		echo $before_widget;

		if ( $title )

    		echo $before_title . $title . $after_title;

		?>

			    		
			<ul class="social-networks unstyled <?php if (empty ($vertical)) : echo 'inline'; endif;?>">
				
					<?php foreach(array("Facebook", "Twitter", "Flickr", "RSS", "Linkedin", "Google-Plus", "Github","Youtube") as $network) : ?>

			    		<?php if (!empty($networks[$network]['link'])) : ?>

						<li <?php if ($display =="icons") { ?> class="display-icons"<?php } ?>>

							<a rel="external" <?php if ($display =="icons") { ?> title="<?php echo strtolower($network); ?>" <?php } ?> href="<?php echo $networks[$network]['link']; ?>">

						    		<?php if (($display == "both") or ($display =="icons")) { ?>


									<i class="icon-<?php echo strtolower($network);?> icon-2x"></i>
									
								<?php } if (($display == "labels") or ($display == "both")) { ?> 

									<?php if (($networks[$network]['label'])!=="") { echo $networks[$network]['label']; } else { echo $network; } ?>

								<?php } ?>

							</a>

						</li>

					<?php endif; ?>

					<?php endforeach; ?>

      		</ul>

		<?php

		echo $after_widget;

	}



	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		

		$instance['twitter'] = $new_instance['twitter'];

		$instance['facebook'] = $new_instance['facebook'];

		$instance['flickr'] = $new_instance['flickr'];

		$instance['feed'] = $new_instance['feed'];

		$instance['linkedin'] = $new_instance['linkedin'];

		$instance['google'] = $new_instance['google'];

		$instance['github'] = $new_instance['github'];

		$instance['youtube'] = $new_instance['youtube'];

		

		$instance['twitter_label'] = $new_instance['twitter_label'];

		$instance['facebook_label'] = $new_instance['facebook_label'];

		$instance['flickr_label'] = $new_instance['flickr_label'];

		$instance['feed_label'] = $new_instance['feed_label'];

		$instance['linkedin_label'] = $new_instance['linkedin_label'];

		$instance['google_label'] = $new_instance['google_label'];

		$instance['github_label'] = $new_instance['github_label'];

		$instance['youtube_label'] = $new_instance['youtube_label'];



		$instance['display'] = $new_instance['display'];

		$instance['vertical'] = $new_instance['vertical'];



		return $instance;

	}



	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );

		$title = strip_tags($instance['title']);

			

		$twitter = $instance['twitter'];		

		$facebook = $instance['facebook'];

		$flickr = $instance['flickr'];		

		$feed = $instance['feed'];

		$linkedin = $instance['linkedin'];	

		$google = $instance['google'];

		$github = $instance['github'];

		$youtube = $instance['youtube'];

		

		$twitter_label = $instance['twitter_label'];

		$facebook_label = $instance['facebook_label'];

		$flickr_label = $instance['flickr_label'];

		$feed_label = $instance['feed_label'];

		$linkedin_label = $instance['linkedin_label'];

		$google_label = $instance['google_label'];

		$github_label = $instance['github_label'];

		$youtube_label = $instance['youtube_label'];



		$display = $instance['display'];		

		$vertical = $instance['vertical'];		




		$text = format_to_edit($instance['text']);

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'social_networks_widget' ); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

    

		<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Facebook'); ?>:</legend>

			

			<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></p>

			

			<p><label for="<?php echo $this->get_field_id('facebook_label'); ?>"><?php _e('Facebook label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('facebook_label'); ?>" name="<?php echo $this->get_field_name('facebook_label'); ?>" type="text" value="<?php echo esc_attr($facebook_label); ?>" /></p>

		</fieldset>	

		

        <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Twitter'); ?>:</legend>	

		<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('twitter_label'); ?>"><?php _e('Twitter label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo esc_attr($twitter_label); ?>" /></p>

        </fieldset>	

		

        <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Flickr'); ?>:</legend>

		<p><label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('flickr_label'); ?>"><?php _e('Flickr label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('flickr_label'); ?>" name="<?php echo $this->get_field_name('flickr_label'); ?>" type="text" value="<?php echo esc_attr($flickr_label); ?>" /></p>

        </fieldset>	

		

        <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('RSS feed'); ?>:</legend>

		<p><label for="<?php echo $this->get_field_id('feed'); ?>"><?php _e('RSS feed:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php echo esc_attr($feed); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('feed_label'); ?>"><?php _e('RSS label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('feed_label'); ?>" name="<?php echo $this->get_field_name('feed_label'); ?>" type="text" value="<?php echo esc_attr($feed_label); ?>" /></p>

        </fieldset>	

    

    <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Linkedin'); ?>:</legend>

    <p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('linkedin_label'); ?>"><?php _e('Linkedin label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_label'); ?>" name="<?php echo $this->get_field_name('linkedin_label'); ?>" type="text" value="<?php echo esc_attr($linkedin_label); ?>" /></p>

        </fieldset>	

    

    <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Google Plus'); ?>:</legend>

    <p><label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google Plus URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('google_label'); ?>"><?php _e('Google Plus label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('google_label'); ?>" name="<?php echo $this->get_field_name('google_label'); ?>" type="text" value="<?php echo esc_attr($google_label); ?>" /></p>

        </fieldset>	


    <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Github'); ?>:</legend>

    <p><label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('github_label'); ?>"><?php _e('Github label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('github_label'); ?>" name="<?php echo $this->get_field_name('github_label'); ?>" type="text" value="<?php echo esc_attr($github_label); ?>" /></p>

        </fieldset>	    


    <fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">

			<legend style="padding:0 5px;"><?php _e('Youtube'); ?>:</legend>

    <p><label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube URL:'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('youtube_label'); ?>"><?php _e('Youtube label:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('youtube_label'); ?>" name="<?php echo $this->get_field_name('youtube_label'); ?>" type="text" value="<?php echo esc_attr($youtube_label); ?>" /></p>

        </fieldset>	

		<p><strong><?php esc_html_e('Display:', 'social_networks_widget' )?></strong></p>

		<p>
			<label for="<?php echo $this->get_field_id('icons'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="icons" id="<?php echo $this->get_field_id('icons'); ?>" <?php checked($display, "icons"); ?>></input>  <?php esc_html_e('Icons', 'social_networks_widget' )?></label>

			<label for="<?php echo $this->get_field_id('labels'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="labels" id="<?php echo $this->get_field_id('labels'); ?>" <?php checked($display, "labels"); ?>></input> <?php esc_html_e('Labels', 'social_networks_widget' )?></label>

			<label for="<?php echo $this->get_field_id('both'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="both" id="<?php echo $this->get_field_id('both'); ?>" <?php checked($display, "both"); ?>></input> <?php esc_html_e('Both', 'social_networks_widget' )?> </label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('vertical'); ?>"><input id="<?php echo $this->get_field_id( 'vertical' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'vertical' ); ?>" value="1" <?php checked( 1, $instance['vertical'] ); ?>/> <?php esc_html_e( 'Display as vertical list?', 'social_networks_widget' ); ?></label>
	</p>


<?php

	}

}
}

?>