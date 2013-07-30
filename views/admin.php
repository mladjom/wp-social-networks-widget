<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e('Title:', $this->plugin_slug); ?>
	</label>
	<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Facebook', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('facebook'); ?>">
			<?php _e('Facebook URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $instance['facebook']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('facebook_label'); ?>">
			<?php _e('Facebook label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook_label'); ?>" name="<?php echo $this->get_field_name('facebook_label'); ?>" type="text" value="<?php echo $instance['facebook_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Twitter', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('twitter'); ?>">
			<?php _e('Twitter URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $instance['twitter']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('twitter_label'); ?>">
			<?php _e('Twitter label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo $instance['twitter_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Flickr', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('flickr'); ?>">
			<?php _e('Flickr URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $instance['flickr']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('flickr_label'); ?>">
			<?php _e('Flickr label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr_label'); ?>" name="<?php echo $this->get_field_name('flickr_label'); ?>" type="text" value="<?php echo $instance['flickr_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('RSS feed', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('feed'); ?>">
			<?php _e('RSS feed:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php echo $instance['feed']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('feed_label'); ?>">
			<?php _e('RSS label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_label'); ?>" name="<?php echo $this->get_field_name('feed_label'); ?>" type="text" value="<?php echo $instance['feed_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Linkedin', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('linkedin'); ?>">
			<?php _e('Linkedin URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $instance['linkedin']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('linkedin_label'); ?>">
			<?php _e('Linkedin label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin_label'); ?>" name="<?php echo $this->get_field_name('linkedin_label'); ?>" type="text" value="<?php echo $instance['linkedin_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Google Plus', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('google'); ?>">
			<?php _e('Google Plus URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo $instance['google']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('google_label'); ?>">
			<?php _e('Google Plus label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('google_label'); ?>" name="<?php echo $this->get_field_name('google_label'); ?>" type="text" value="<?php echo $instance['google_label']; ?>" />
	</p>
</fieldset>
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Github', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('github'); ?>">
			<?php _e('Github URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo $instance['github']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('github_label'); ?>">
			<?php _e('Github label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('github_label'); ?>" name="<?php echo $this->get_field_name('github_label'); ?>" type="text" value="<?php echo $instance['github_label']; ?>" />
	</p>
</fieldset>
<!-- Youtube -->
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Youtube', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('youtube'); ?>">
			<?php _e('Youtube URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $instance['youtube']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('youtube_label'); ?>">
			<?php _e('Youtube label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('youtube_label'); ?>" name="<?php echo $this->get_field_name('youtube_label'); ?>" type="text" value="<?php echo $instance['youtube_label']; ?>" />
	</p>
</fieldset>
<!-- Bitbicket -->
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Bitbicket', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('bitbucket'); ?>">
			<?php _e('Bitbicket URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('bitbucket'); ?>" name="<?php echo $this->get_field_name('bitbucket'); ?>" type="text" value="<?php echo $instance['bitbucket']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('bitbucket_label'); ?>">
			<?php _e('Bitbicket label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('bitbucket_label'); ?>" name="<?php echo $this->get_field_name('bitbucket_label'); ?>" type="text" value="<?php echo $instance['bitbucket_label']; ?>" />
	</p>
</fieldset>
<!-- Instagram -->
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Instagram', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('instagram'); ?>">
			<?php _e('Instagram URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instance['instagram']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('instagram_label'); ?>">
			<?php _e('Instagram label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram_label'); ?>" name="<?php echo $this->get_field_name('instagram_label'); ?>" type="text" value="<?php echo $instance['instagram_label']; ?>" />
	</p>
</fieldset>
<!-- Pinterest -->
<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
	<legend style="padding:0 5px;">
	<?php _e('Pinterest', $this->plugin_slug); ?>
	:</legend>
	<p>
		<label for="<?php echo $this->get_field_id('pinterest'); ?>">
			<?php _e('Pinterest URL:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $instance['pinterest']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('pinterest_label'); ?>">
			<?php _e('Pinterest label:', $this->plugin_slug); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest_label'); ?>" name="<?php echo $this->get_field_name('pinterest_label'); ?>" type="text" value="<?php echo $instance['pinterest_label']; ?>" />
	</p>
</fieldset>
<!-- Display: Select Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'display' ); ?>">
		<?php _e( 'Display:', $this->plugin_slug ); ?>
	</label>
	<select name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'display' ); ?>">
		<?php foreach ( $this->get_display_options() as $k => $v ) { ?>
		<option value="<?php echo $k; ?>"<?php selected( $instance['display'], $k ); ?>><?php echo $v; ?></option>
		<?php } ?>
	</select>
</p>

<!-- Icon Size: Select Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'size' ); ?>">
		<?php _e( 'Size:', $this->plugin_slug ); ?>
	</label>
	<select name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>">
		<?php foreach ( $this->get_size_options() as $k => $v ) { ?>
		<option value="<?php echo $k; ?>"<?php selected( $instance['size'], $k ); ?>><?php echo $v; ?></option>
		<?php } ?>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id('vertical'); ?>">
		<input id="<?php echo $this->get_field_id( 'vertical' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'vertical' ); ?>" value="1" <?php checked( 1, $instance['vertical'] ); ?>/>
		<?php esc_html_e( 'Display as vertical list?', $this->plugin_slug ); ?>
	</label>
</p>