<?php
/* Our variables from the widget settings. */
$title = apply_filters('widget_title', $instance['title']);
$display = $instance['display'];
$size = $instance['size'];
$vertical = $instance['vertical'];
$new_window = $instance['new_window'];
$css = $instance['css'];

$social_networks = $instance['social_networks'];

if ($title)
    echo $before_title . $title . $after_title;
?>

<ul class="social-networks unstyled <?php if ($vertical == 0)  echo 'inline'; ?>">

<?php foreach ($social_networks as $network) : ?>

        <li class="<?php echo $network['icon']; ?> <?php echo $size; ?> <?php if ($display == "icons") { ?> display-icons<?php } ?>">

            <a rel="external" <?php if ($display == "icons") { ?> title="<?php echo strtolower($network['label']); ?>" <?php } ?> <?php if ($new_window == 1) { ?> target="_blank" <?php } ?> href="<?php echo $network['url']; ?>">

                <?php if (($display == "both") or ( $display == "icons")) { ?>

                    <i class="<?php echo strtolower($network['icon']); ?>"></i>

                <?php } if (($display == "labels") or ( $display == "both")) { ?> 

                    <?php
                    if (($network['label']) !== "") {
                        echo $network['label'];
                    } else {
                        echo $network['icon'];
                    }
                    ?>

                <?php } ?>

            </a>

        </li>

<?php endforeach; ?>

</ul>
