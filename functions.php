<?php 

include 'autocracy/autocracy.php';

add_theme_support('post-thumbnails');
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support('html5', array('search-form'));

function halobi_scripts() {
	//Stylesheets
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'normalize' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style' );
	wp_register_style( 'theme', get_template_directory_uri() . '/css/theme.css' );
	wp_enqueue_style( 'theme' );
	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'responsive' );
	wp_register_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css' );
	wp_enqueue_style( 'slick' );
    wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style( 'fontawesome' );

	//Scripts
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'function', get_template_directory_uri() . '/js/function.js', array('jquery', 'slick'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'halobi_scripts' );

function halobi_title( $title )
{
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return __( 'Home', 'theme_domain' ) . ' | '. get_bloginfo( 'name' ). ' | '. get_bloginfo( 'description' );
	}
	return $title;
}
add_filter( 'wp_title', 'halobi_title' );


function halobi_create_post_type() {
    register_post_type('solutions', array(
        'labels' => array(
            'name' => __('Solutions'),
            'singular_name' => __('Solution')
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'solutions'),
        'menu_icon'   => 'dashicons-chart-area',
        'supports' => array('thumbnail', 'title', 'page-attributes'),
        )
    );
    register_post_type('platform-features', array(
        'labels' => array(
            'name' => __('Platform'),
            'singular_name' => __('Platform Feature')
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'platform-features'),
        'menu_icon'   => 'dashicons-star-filled',
        'supports' => array('thumbnail', 'title', 'page-attributes'),
        )
    );
    register_post_type('data-connectors', array(
        'labels' => array(
            'name' => __('Data Connectors'),
            'singular_name' => __('Data Connector')
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'data-connectors' ),
        'menu_icon'   => 'dashicons-randomize',
        'supports' => array('thumbnail', 'title', 'page-attributes'),
        )
    );

    register_post_type('by-industry', array(
        'labels' => array(
            'name' => __('Industries'),
            'singular_name' => __('Industry')
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'by-industry'),
        'menu_icon'   => 'dashicons-clipboard',
        'supports' => array('title', 'page-attributes'),
        )
    );
    register_post_type('by-department', array(
        'labels' => array(
            'name' => __('Departments'),
            'singular_name' => __('Department')
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'by-department'),
        'menu_icon'   => 'dashicons-analytics',
        'supports' => array('thumbnail', 'title', 'page-attributes'),
        )
    );
    register_post_type('resources', array(
        'labels' => array(
            'name' => __('Resources'),
            'singular_name' => __('Resources'),
            'add_new'            => _x( 'Add New', 'resource' ),
            'add_new_item'       => __( 'Add New Resource' ),
            'new_item'           => __( 'New Resource' ),
            'edit_item'          => __( 'Edit Resource' ),
            'view_item'          => __( 'View Resource' ),
            'all_items'          => __( 'All Resources' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'resources'),
        'taxonomies' => array('resources'),
        'menu_icon'   => 'dashicons-welcome-learn-more',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('videos', array(
        'labels' => array(
            'name' => __('Video Pages'),
            'singular_name' => __('Video Page'),
            'add_new'            => _x( 'Add New', 'video' ),
            'add_new_item'       => __( 'Add New Video Page' ),
            'new_item'           => __( 'New Video Page' ),
            'edit_item'          => __( 'Edit Video Page' ),
            'view_item'          => __( 'View Video Page' ),
            'all_items'          => __( 'All Video Pages' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'video-gallery'),
        'taxonomies' => array('resource-types'),
        'menu_icon'   => 'dashicons-format-video',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('print-materials', array(
        'labels' => array(
            'name' => __('Print Materials'),
            'singular_name' => __('Print Material'),
            'add_new'            => _x( 'Add New', 'print material' ),
            'add_new_item'       => __( 'Add New Print Material' ),
            'new_item'           => __( 'New Print Material' ),
            'edit_item'          => __( 'Edit Print Material' ),
            'view_item'          => __( 'View Print Material' ),
            'all_items'          => __( 'All Print Materials' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'print-materials'),
        'taxonomies' => array('types'),
        'menu_icon'   => 'dashicons-media-text',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('webinars', array(
        'labels' => array(
            'name' => __('Webinars'),
            'singular_name' => __('Webinar'),
            'add_new'            => _x( 'Add New', 'webinar' ),
            'add_new_item'       => __( 'Add New Webinar' ),
            'new_item'           => __( 'New Webinar' ),
            'edit_item'          => __( 'Edit Webinar' ),
            'view_item'          => __( 'View Webinar' ),
            'all_items'          => __( 'All Webinars' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'webinars'),
        'menu_icon'   => 'dashicons-video-alt',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('white-papers', array(
        'labels' => array(
            'name' => __('White Papers'),
            'singular_name' => __('White Paper'),
            'add_new'            => _x( 'Add New', 'white paper' ),
            'add_new_item'       => __( 'Add New White Paper' ),
            'new_item'           => __( 'New White Paper' ),
            'edit_item'          => __( 'Edit White Paper' ),
            'view_item'          => __( 'View White Paper' ),
            'all_items'          => __( 'All White Papers' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'white-papers'),
        'menu_icon'   => 'dashicons-media-default',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('marketing', array(
        'labels' => array(
            'name' => __('Marketing'),
            'singular_name' => __('Marketing Item'),
            'add_new'            => _x( 'Add New', 'marketing item' ),
            'add_new_item'       => __( 'Add New Marketing Item' ),
            'new_item'           => __( 'New Marketing Item' ),
            'edit_item'          => __( 'Edit Marketing Item' ),
            'view_item'          => __( 'View Marketing Item' ),
            'all_items'          => __( 'All Marketing Items' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'info'),
        'menu_icon'   => 'dashicons-megaphone',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('support', array(
        'labels' => array(
            'name' => __('Support'),
            'singular_name' => __('Support Item'),
            'add_new'            => _x( 'Add New', 'support item' ),
            'add_new_item'       => __( 'Add New Support Item' ),
            'new_item'           => __( 'New Support Item' ),
            'edit_item'          => __( 'Edit Support Item' ),
            'view_item'          => __( 'View Support Item' ),
            'all_items'          => __( 'All Support Items' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'support'),
        'menu_icon'   => 'dashicons-admin-tools',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('event-promos', array(
        'labels' => array(
            'name' => __('Event Promos'),
            'singular_name' => __('Event Promotion'),
            'add_new'            => _x( 'Add New', 'event promotion' ),
            'add_new_item'       => __( 'Add New Event Promotion' ),
            'new_item'           => __( 'New Event Promotion' ),
            'edit_item'          => __( 'Edit Event Promotion' ),
            'view_item'          => __( 'View Event Promotion' ),
            'all_items'          => __( 'All Event Promos' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'info/events'),
        'menu_icon'   => 'dashicons-calendar',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('prism-media-center', array(
        'labels' => array(
            'name' => __('Prism Media'),
            'singular_name' => __('Prism Media'),
            'add_new'            => _x( 'Add New', 'prism media' ),
            'add_new_item'       => __( 'Add New Prism Media' ),
            'new_item'           => __( 'New Prism Media' ),
            'edit_item'          => __( 'Edit Prism Media' ),
            'view_item'          => __( 'View Prism Media' ),
            'all_items'          => __( 'All Prism Media' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'prism-media-center'),
        'menu_icon'   => 'dashicons-media-video',
        'supports' => array('title','page-attributes'),
        )
    );
    register_post_type('company', array(
        'labels' => array(
            'name' => __('Company'),
            'singular_name' => __('Company'),
            'add_new'            => _x( 'Add New', 'company info' ),
            'add_new_item'       => __( 'Add New Company Info' ),
            'new_item'           => __( 'New Company Info' ),
            'edit_item'          => __( 'Edit Company Info' ),
            'view_item'          => __( 'View Company Info' ),
            'all_items'          => __( 'All Company Info' )
            ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'company'),
        'menu_icon'   => 'dashicons-building',
        'supports' => array('title','page-attributes'),
        )
    );
}
add_action('init', 'halobi_create_post_type');

function halobi_tax() {
    register_taxonomy(
        'galleries',
        'videos',
        array(
            'label' => __( 'Galleries' ),
            'hierarchical' => true,
            'rewrite' => true
            )
        );
    register_taxonomy(
        'print-types',
        'print-materials',
        array(
            'label' => __( 'Print Types' ),
            'hierarchical' => true,
            'rewrite' => true
            )
        );
    register_taxonomy(
        'media-categories',
        'prism-media-center',
        array(
            'label' => __( 'Categories' ),
            'hierarchical' => true,
            'rewrite' => true
            )
        );
}
add_action( 'init', 'halobi_tax' );


register_nav_menus( array(
    'Header_Nav' => 'Header Navigation Area',
    'Footer_Nav' => 'Footer Navigation Area',
    ));

register_sidebar( 
    array(
        'name' => __( 'Solutions Sidebar', 'wpb' ),
        'id' => 'sidebar-solutions',
        'description' => __( 'This sidebar appears on the right hand side of solutions pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

register_sidebar( 
    array(
        'name' => __( 'Company Sidebar', 'wpb' ),
        'id' => 'sidebar-company',
        'description' => __( 'This sidebar appears on the right hand side of company pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

register_sidebar( 
    array(
        'name' => __( 'Resources Sidebar', 'wpb' ),
        'id' => 'sidebar-resources',
        'description' => __( 'This sidebar appears on the right hand side of resource pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

register_sidebar( 
    array(
        'name' => __( 'Platform Sidebar', 'wpb' ),
        'id' => 'sidebar-platform',
        'description' => __( 'This sidebar appears on the right hand side of platform pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

register_sidebar( 
    array(
        'name' => __( 'Webinars Sidebar', 'wpb' ),
        'id' => 'sidebar-webinars',
        'description' => __( 'This sidebar appears on the right hand side of webinars pages.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

register_sidebar( 
    array(
        'name' => __( 'Homepage Sidebar', 'wpb' ),
        'id' => 'sidebar-homepage',
        'description' => __( 'This sidebar appears on the right hand side of homepage.', 'wpb' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        ) 
    );

add_filter( 'the_content', 'clean_post_content' );
function clean_post_content($content) {

    // Remove inline styling
    $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);

    // Remove font tag
    $content = preg_replace('/<font[^>]+>/', '', $content);

    // Remove empty tags
    $post_cleaners = array('<p></p>' => '', '<p> </p>' => '', '<p>&nbsp;</p>' => '', '<span></span>' => '', '<span> </span>' => '', '<span>&nbsp;</span>' => '', '<span>' => '', '</span>' => '', '<font>' => '', '</font>' => '');
    $content = strtr($content, $post_cleaners);

    return $content;
}

//Setup backend menu order
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'edit.php?post_type=solutions', // Solutions
        'edit.php?post_type=by-industry', // By Industry
        'edit.php?post_type=by-department', // By Department
        'separator1', // First separator
        'edit.php?post_type=platform-features', // Platform Features
        'edit.php?post_type=data-connectors', // Data Connectors
        'edit.php?post_type=resources', // Resources
        'edit.php?post_type=marketing', // Marketing Pages
        'edit.php?post_type=event-promos', // Event Promotions
        'separator2', // Second separator
        'edit.php?post_type=videos', // Videos
        'edit.php?post_type=print-materials', // Print Materials
        'edit.php?post_type=support', // Support Materials
        'edit.php?post_type=prism-media-center', // Prism Media Materials
        'edit.php?post_type=webinars', // Webinars
        'edit.php?post_type=white-papers', // White Papers
        'edit.php?post_type=company', // Company
        'separator-last', // Last separator
        'index.php', // Dashboard
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        'upload.php', // Media
        'edit-comments.php', // Comments
        'separator3', // Third separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();
    
    acf_add_options_sub_page('Homepage');
    acf_add_options_sub_page('Header');
    acf_add_options_sub_page('Footer');
    
}

function pippin_add_taxonomy_filters() {
    global $typenow;

    // an array of all the taxonomyies you want to display. Use the taxonomy name or slug
    $videotaxonomies = array('galleries');

    // must set this to the post type you want the filter(s) displayed on
    if( $typenow == 'videos' ){

        foreach ($videotaxonomies as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            $terms = get_terms($tax_slug);
            $current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
            if(count($terms) > 0) {
                echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
                echo "<option value=''>Show All $tax_name</option>";
                foreach ($terms as $term) { 
                    echo '<option value='. $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
                }
                echo "</select>";
            }
        }
    }
}
add_action( 'restrict_manage_posts', 'pippin_add_taxonomy_filters' );

add_filter( 'manage_edit-videos_columns', 'my_edit_videos_columns' ) ;

function my_edit_videos_columns( $columns ) {

    $videocolumns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Video Page' ),
        'galleries' => __( 'Gallery' ),
        'thumbnail' => __( 'Thumbnail' ),
        'description' => __( 'Description' ),
        'date' => __( 'Date' )
        );

    return $videocolumns;
}

function get_single_breadcrumb($taxonomy) {
    global $post;
    $terms = get_the_terms($post->id, $taxonomy);
    $i = 0; 
    foreach ($terms as $term) {
        if ($i == 0) {
            echo '<a href="'.get_term_link( $term->slug, $taxonomy ).'">';
            echo $term->name;
            echo '</a>';
            $i++;
        }
    }
}


add_action( 'manage_videos_posts_custom_column', 'my_manage_videos_columns', 10, 2 );

function my_manage_videos_columns( $videocolumn, $post_id ) {
    global $post;

    switch( $videocolumn ) {

        /* If displaying the 'thumbnail' column. */
        case 'thumbnail' :
        if( have_rows('videos') ):
                        // loop through the rows of data
            while ( have_rows('videos') ) : the_row();
        $video = get_sub_field( 'youtube_embed' );

        preg_match('/src="(.+?)"/', $video, $matches_url );
        $src = $matches_url[1]; 

        preg_match('/embed(.*?)?feature/', $src, $matches_id );
        $id = $matches_id[1];
        $id = str_replace( str_split( '?/' ), '', $id );

                        // display a sub field value


        endwhile;
        echo '<img style="max-width: 100%;" src="http://img.youtube.com/vi/'.$id.'/0.jpg" />';
        else :
                        // no rows found
            endif;

              /*      if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail();
                }  */

                break;
                /* If displaying the 'thumbnail' column. */
                case 'description' :
                echo '<h3>';
                the_title();
                echo '</h3>';
                if(get_field('description')) {
                    echo '<p>';
                    the_field('description');
                    echo '</p>';
                }

                break;

                /* If displaying the 'galleries' column. */
                case 'galleries' :

                /* Get the genres for the post. */
                $terms = get_the_terms( $post_id, 'galleries' );

                /* If terms were found. */
                if ( !empty( $terms ) ) {

                    $out = array();

                    /* Loop through each term, linking to the 'edit posts' page for the specific term. */
                    foreach ( $terms as $term ) {
                        $out[] = sprintf( '<a href="%s">%s</a>',
                            esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'galleries' => $term->slug ), 'edit.php' ) ),
                            esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'galleries', 'display' ) )
                            );
                    }

                    /* Join the terms, separating them with a comma. */
                    echo join( ', ', $out );
                }

                /* If no terms were found, output a default message. */
                else {
                    _e( 'No Galleries' );
                }

                break;

                /* Just break out of the switch statement for everything else. */
                default :
                break;
            }
        }


        ?>