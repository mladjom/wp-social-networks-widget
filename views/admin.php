<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title:', 'wpsnv'); ?>
    </label>
    <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
</p>
<?php
//var_dump($instance['social_networks']); 
$social_networks = $instance['social_networks'];
?>
<?php $md5s = substr(md5(rand()), 0, 7); ?>

<table class="repeatable-fieldset-one <?php echo $md5s; ?>" width="100%">
    <thead>
        <tr>
            <th width="2%"></th>
            <th width="20%">Social Network</th>
            <th width="30%">Label</th>
            <th width="40%">URL</th>
            <th width="2%"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($social_networks) :

            $new_counter = max(array_keys($social_networks));

            foreach ($social_networks as $key => $value) {
                ?>
                <tr>
                    <td><a class="button remove-row" href="#">x</a></td>
                    <td>
                        <select name="<?php echo $this->get_field_name('social_networks'); ?>[<?php echo $key; ?>][icon]" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[<?php echo $key; ?>][icon]">
                            <?php foreach ($this->get_social_networks() as $k => $v) { ?>
                                <option value="<?php echo $v['icon']; ?>"<?php selected($value['icon'], $k); ?>><?php echo $v['icon']; ?></option>
                            <?php } ?>
                        </select>                        
                    </td>
                    <td>
                        <input type="text" data-dynamic="<?php echo $key; ?>" name="<?php echo $this->get_field_name('social_networks'); ?>[<?php echo $key; ?>][label]"  value="<?php echo $value['label']; ?>" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[<?php echo $key; ?>][label]" />
                    </td>
                    <td>
                        <input type="text" name="<?php echo $this->get_field_name('social_networks'); ?>[<?php echo $key; ?>][url]"  value="<?php echo $value['url']; ?>" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[<?php echo $key; ?>][url]" />
                    </td>
                    <td><a class="sort">|||</a></td>
                </tr>
                <?php
            }
        else :
            $new_counter = 0;
            ?>
            <tr>
                <td><a class="button remove-row" href="#">x</a></td>
                <td>
                    <select name="<?php echo $this->get_field_name('social_networks'); ?>[0][icon]" class="widefat"
                            id="<?php echo $this->get_field_id('social_networks'); ?>[0][icon]">
                        <?php foreach ($this->get_social_networks() as $k => $v) { ?>
                            <option value="<?php echo $v['icon']; ?>"><?php echo $v['icon']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="text" data-dynamic="0" name="<?php echo $this->get_field_name('social_networks'); ?>[0][label]"  value="" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[0][label]" />
                </td>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('social_networks'); ?>[0][url]"  value="" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[0][url]" />
                </td>
                <td><a class="sort">|||</a></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<p>
    <a id="add-row-<?php echo $md5s; ?>" class="button add-row" href="#"><?php _e('Add another:', 'wsnv'); ?></a>
</p>
<script>
    jQuery(document).ready(function ($) {

        var counter = <?php echo $new_counter; ?>;

        $('#add-row-<?php echo $md5s; ?>').on('click', function (e) {

            var new_counter = 1 + counter++;

            var id_input = '<tr class=""><td><a class="button remove-row" href="#">x</a></td>'
                    + '<td><select name="<?php echo $this->get_field_name('social_networks'); ?>[' + new_counter + '][icon]" class="widefat" id="<?php echo $this->get_field_id('social_networks'); ?>[' + new_counter + '][icon]">'
            <?php foreach ($this->get_social_networks() as $k => $v) { ?>
                + '<option value="<?php echo $v['icon']; ?>"><?php echo $k; ?></option>'
            <?php } ?>
            + '</select></td>'
                    + '<td><input type="text" class="widefat" name="<?php echo $this->get_field_name('social_networks'); ?>[' + new_counter + '][label]" id="<?php echo $this->get_field_id('social_networks'); ?>[' + new_counter + '][label]" /></td>'
                    + '<td><input type="text" class="widefat" name="<?php echo $this->get_field_name('social_networks'); ?>[' + new_counter + '][url]" id="<?php echo $this->get_field_id('social_networks'); ?>[' + new_counter + '][url]" /></td>'
                    + '</td><td><a class="sort">|||</a></td></tr>';

            $(id_input).appendTo($(this).parents().find('.widget-content table.<?php echo $md5s; ?> tbody'));
            e.preventDefault();
        });

        $('.repeatable-fieldset-one').on("click", ".remove-row", function (e) { //user click on remove text
            $(this).parents('tr').remove();
            e.preventDefault();
        })

        $('.repeatable-fieldset-one tbody').sortable({
            opacity: 0.6,
            revert: true,
            cursor: 'move',
            handle: '.sort'
        });

    });
</script>

<!-- Display: Select Input -->
<p>
    <label for="<?php echo $this->get_field_id('display'); ?>">
        <?php _e('Display:', 'wsnv'); ?>
    </label>
    <select name="<?php echo $this->get_field_name('display'); ?>" class="widefat" id="<?php echo $this->get_field_id('display'); ?>">
        <?php foreach ($this->get_display_options() as $k => $v) { ?>
            <option value="<?php echo $k; ?>"<?php selected($instance['display'], $k); ?>><?php echo $v; ?></option>
        <?php } ?>
    </select>
</p>

<!-- Icon Size: Select Input -->
<p>
    <label for="<?php echo $this->get_field_id('size'); ?>">
        <?php _e('Size:', 'wsnv'); ?>
    </label>
    <select name="<?php echo $this->get_field_name('size'); ?>" class="widefat" id="<?php echo $this->get_field_id('size'); ?>">
        <?php foreach ($this->get_size_options() as $k => $v) { ?>
            <option value="<?php echo $k; ?>"<?php selected($instance['size'], $k); ?>><?php echo $v; ?></option>
        <?php } ?>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('vertical'); ?>">
        <input id="<?php echo $this->get_field_id('vertical'); ?>" type="checkbox" name="<?php echo $this->get_field_name('vertical'); ?>" value="1" <?php checked(1, $instance['vertical']); ?>/>
        <?php esc_html_e('Display as vertical list?', 'wsnv'); ?>
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id('new_window'); ?>">
        <input id="<?php echo $this->get_field_id('new_window'); ?>" type="checkbox" name="<?php echo $this->get_field_name('new_window'); ?>" value="1" <?php checked(1, $instance['new_window']); ?>/>
        <?php esc_html_e('Open links in a new window?', 'wsnv'); ?>
    </label>
</p>
<?php /* ?><p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Custom CSS:'); ?></label>


  <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('css'); ?>" name="<?php echo $this->get_field_name('css'); ?>"><?php echo $text; ?></textarea>
  </p><?php */ ?>
