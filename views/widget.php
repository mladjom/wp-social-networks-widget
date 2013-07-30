<?php
	 /* Our variables from the widget settings. */
	 $title = apply_filters('widget_title', $instance['title']); 
	 $display = $instance['display'];
	 $size = $instance['size'];
	 $vertical = $instance['vertical'];
	 
	$networks['Twitter']['link'] = $instance['twitter'];
	$networks['Facebook']['link'] = $instance['facebook'];
	$networks['Flickr']['link'] = $instance['flickr'];
	$networks['RSS']['link'] = $instance['feed'];
	$networks['Linkedin']['link'] = $instance['linkedin'];
	$networks['Google-Plus']['link'] = $instance['google'];
	$networks['Github']['link'] = $instance['github'];
	$networks['Youtube']['link'] = $instance['youtube'];
	$networks['Bitbucket']['link'] = $instance['bitbucket'];
	$networks['Instagram']['link'] = $instance['instagram'];
	$networks['Pinterest']['link'] = $instance['pinterest'];
	
	$networks['Twitter']['label'] = $instance['twitter_label'];
	$networks['Facebook']['label'] = $instance['facebook_label'];
	$networks['Flickr']['label'] = $instance['flickr_label'];
	$networks['RSS']['label'] = $instance['feed_label'];
	$networks['Linkedin']['label'] = $instance['linkedin_label'];
	$networks['Google-Plus']['label'] = $instance['google_label'];
	$networks['Github']['label'] = $instance['github_label'];
	$networks['Youtube']['label'] = $instance['youtube_label'];
	$networks['Bitbucket']['label'] = $instance['bitbucket_label'];
	$networks['Instagram']['label'] = $instance['instagram_label'];
	$networks['Pinterest']['label'] = $instance['pinterest_label'];

	if ( $title )echo $before_title . $title . $after_title;
?>

	<ul class="social-networks unstyled <?php if ($vertical == 0) : echo 'inline'; endif;?>">
		
			<?php foreach(array("Facebook", "Twitter", "Flickr", "RSS", "Linkedin", "Google-Plus", "Github","Youtube", "Bitbucket", "Instagram","Pinterest") as $network) : ?>

					<?php if (!empty($networks[$network]['link'])) : ?>

				<li <?php if ($display =="icons") { ?> class="display-icons"<?php } ?>>

					<a rel="external" <?php if ($display =="icons") { ?> title="<?php echo strtolower($network); ?>" <?php } ?> href="<?php echo $networks[$network]['link']; ?>">

								<?php if (($display == "both") or ($display =="icons")) { ?>


							<i class="icon-<?php echo strtolower($network);?> icon-<?php echo $size;?>"></i>
							
						<?php } if (($display == "labels") or ($display == "both")) { ?> 

							<?php if (($networks[$network]['label'])!=="") { echo $networks[$network]['label']; } else { echo $network; } ?>

						<?php } ?>

					</a>

				</li>

			<?php endif; ?>

			<?php endforeach; ?>

			</ul>
