<?php
/* Widget Name: Socialize
  Description: This widget allows you to place your social media links in your sidebar.
  Version: 1.0
  Author: Nicholas Koskowski
  Author URI: http://inspyregroup.com
 */

  class socializeWidget extends WP_Widget {

    function socializeWidget() {
        $widget_ops = array(
            'classname' => 'socializeWidget',
            'description' => 'This widget allows you to place your social media links in your sidebar.'
            );

        $this->WP_Widget(
            'socializeWidget', 'Socialize by Inspyre', $widget_ops
            );
    }

    function widget($args, $instance) { // widget sidebar output
        extract($args, EXTR_SKIP);

        /* Our variables from the widget settings. */
        $title = $instance['title'];
        $rss = $instance['rss'];
        $twitter = $instance['twitter'];
        $facebook = $instance['facebook'];
        $gplus = $instance['gplus'];
        $linkedin = $instance['linkedin'];
        $ytube = $instance['ytube'];
        $scoopit = $instance['scoopit'];


        echo $before_widget; // pre-widget code from theme
        // YOUR DISPLAY OUTPUT GOES HERE!!!!!!!

        $imageDir = get_template_directory_uri().'/images/social-media/';

        echo $before_title;
        echo $title;
        echo $after_title;

        echo '<ul class="social-media">';

        echo '<li><a href="'.$rss.'"><img src="'.$imageDir.'rss.png'.'"></a></li>';
        echo '<li><a href="'.$twitter.'"><img src="'.$imageDir.'twitter.png'.'"></a></li>';
        echo '<li><a href="'.$facebook.'"><img src="'.$imageDir.'facebook.png'.'"></a></li>';
        echo '<li><a href="'.$gplus.'"><img src="'.$imageDir.'google.png'.'"></a></li>';
        echo '<li><a href="'.$linkedin.'"><img src="'.$imageDir.'linkedin.png'.'"></a></li>';
        echo '<li><a href="'.$ytube.'"><img src="'.$imageDir.'youtube.png'.'"></a></li>';
        echo '<li><a href="'.$scoopit.'"><img src="'.$imageDir.'scoopit.png'.'"></a></li>';

        echo '</ul>';

        echo $after_widget; // post-widget code from theme
    }

    /**
     * Update the widget settings.
     * */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['rss'] = strip_tags($new_instance['rss']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['gplus'] = strip_tags($new_instance['gplus']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['ytube'] = strip_tags($new_instance['ytube']);
        $instance['scoopit'] = strip_tags($new_instance['scoopit']);

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form($instance) {

        /* Set up some default widget settings. */
        $defaults = array('title' => __('', 'example'), 'rss' => __('', 'example'), 'twitter' => __('', 'example'),'facebook' => __('', 'example'),'gplus' => __('', 'example'),'linkedin' => __('', 'example'),'ytube' => __('', 'example'),'scoopit' => __('', 'example'));
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $instance['rss']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Google Plus Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" value="<?php echo $instance['gplus']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ytube'); ?>"><?php _e('Youtube Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('ytube'); ?>" name="<?php echo $this->get_field_name('ytube'); ?>" value="<?php echo $instance['ytube']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('scoopit'); ?>"><?php _e('ScoopIt Link:', 'hybrid'); ?></label>
            <input id="<?php echo $this->get_field_id('scoopit'); ?>" name="<?php echo $this->get_field_name('scoopit'); ?>" value="<?php echo $instance['scoopit']; ?>" style="width:100%;" />
        </p>

        <?php
    }

}

add_action(
    'widgets_init', create_function('', 'return register_widget("socializeWidget");')
    );
?>