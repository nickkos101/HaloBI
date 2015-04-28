<?php
/* Creates the Theme Options Page */

function main_theme_options_do_page() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
    wp_enqueue_style('thickbox');
    wp_enqueue_style( 'style-name', get_template_directory_uri().'/autocracy/admin.css' );
    wp_enqueue_script('upload_enable', get_template_directory_uri() . '/autocracy/theme-options.js', false, null);
    ?>
    <div class="wrap">
        <?php
        screen_icon();
        echo "<h2>" . wp_get_theme() . __(' Theme Manager', 'sampletheme') . "</h2>";
        ?>
        <?php if (isset($_REQUEST['settings-updated'])) : ?>
        <div class="updated fade"><p><strong><?php _e('Options saved', 'sampletheme'); ?></strong></p></div>
    <?php endif; ?>

    <form class="col-wrap" method="post" action="options.php">
     <?php
     settings_fields('main_options');
     $optionname= 'main_theme_options';
     $mainoptions = get_option($optionname);
     ?>
     <div class="column full">
        <h4>Video Options</h4>
        <p>
            <label>Video MP4 Link</label>
            <?php autoc_def_textfield($optionname, 'mp4link'); ?>
        </p>
        <p>
            <label>Video WebM Link</label>
            <?php autoc_def_textfield($optionname, 'webMlink'); ?>
        </p>
        <p>
            <label>Video Headline Text</label>
            <?php autoc_def_textfield($optionname, 'videoheadline'); ?>
        </p>
        <p>
            <label>Video Text Content</label>
            <?php autoc_def_textarea($optionname, 'videocontent'); ?>
        </p>
    </div>
    <div class="column two-thirds">
        <h4>Homepage Content Options</h4>
        <p>
            <label>Bottom Content Headline</label>
            <?php autoc_def_textfield($optionname, 'btmcontenttitle'); ?>
        </p>
        <p>
            <label>Bottom Content Text</label>
            <?php autoc_def_textarea($optionname, 'btmcontentxt'); ?>
        </p>
    </div>
    <div class="column third">
        <h4>Homepage Avatar Content Options</h4>
        <p>
            <label>Avatar Image</label>
            <?php autoc_def_uploadarea($optionname, 'avatarimg'); ?>
        </p>
        <p>
            <label>Avatar Headline</label>
            <?php autoc_def_textfield($optionname, 'avatartitle'); ?>
        </p>
        <p>
            <label>Avatar Text</label>
            <?php autoc_def_textarea($optionname, 'avatartext'); ?>
        </p>
    </div>
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'sampletheme'); ?>" />
    </p>
</form>
</div>
<?php
}

function main_theme_options_validate($input) {
    global $select_options, $radio_options;
    // Our checkbox value is either 0 or 1
    if (!isset($input['option1']))
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    // Say our text option must be safe text with no HTML tags
    $input['sometext'] = wp_filter_nohtml_kses($input['sometext']);
    // Our select option must actually be in our array of select options
    // Say our textarea option must be safe text with the allowed tags for posts
    $input['sometextarea'] = wp_filter_post_kses($input['sometextarea']);
    return $input;
}
?>