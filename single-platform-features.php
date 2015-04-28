<?php get_header(); ?>
<main class="solution">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="/platform-features">Platform</a> / <?php if ( $post->post_parent > 0 ) { ?> <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a> /<?php } ?> <?php the_title(); ?></p>
				</div>
				<?php 
					if (get_field('platform_element')) {
						echo '<h2>'; 
						the_field('platform_element');
						echo '</h2>';
					} 
					else { 
						echo '<h2>';
						the_title();	
						echo '</h2>';
					}
					echo '<div class="feature-block">';
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
					} 
					if (get_field('page_header')) { 
						echo '<h3>';
						the_field('page_header'); 
						echo '</h3>';
					} 
					if (get_field('quick_description')) { 
						echo '<p>';						
						the_field('quick_description'); 
						echo '</p>';
						} 
					if (get_field('continued_description')) { 
						echo '<p><small>';
						the_field('continued_description'); 
						echo '</small></p>';
					}
					echo '</div>';
				?>
			</div>
			<div class="column full">
				<?php
					if( get_field('key_features') == 'Yes') { 
						echo '<h3>Key Features</h3>';
						echo '<ul>';
 						// loop through the rows of data
    					while ( have_rows('key_bullets') ) : 
    						the_row();
        					// display a sub field value
        					echo '<li>';
        					the_sub_field('feature_bullet');
        					echo '</li>';
    					endwhile;
						echo '</ul>';
					}
					if (get_field('video_link')) { 
						echo '<div class="video-link taligncenter"><a href="';
						the_field('video_link');
						echo '">';
						the_field('video_link_text'); 
						echo '</a></div>';
					}
					if(get_field('infographic_image')) {
					echo '<div class="column two-thirds"><div class="column-spacer-right">';
					} 					 
					if( have_rows('main_features') ):
						// loop through the rows of data
    					while ( have_rows('main_features') ) : the_row();
        					// display a sub field value
    						if( get_sub_field('custom_icon')) {
    							echo '<div class="column fifth">';
    							echo '<img class="custom-icon" src="';
    							the_sub_field('custom_icon');
    							echo '" />';
    							echo '</div>';
    							echo '<div class="column four-fifths">';
    						}
        					echo '<h5 class="feature-title">';
    						if( get_field('platform_icon')) {
    							echo '<img class="icon-image" src="';
    							the_field('platform_icon');
    							echo '" />';
    						}
        					the_sub_field('feature_title');
        					echo '</h5>';
        					if(get_sub_field('feature_image')) {
        						echo '<img class="inline-image" src="';
    							the_sub_field('feature_image');
    							echo '" />';
        					}
        					if(get_sub_field('feature_description')) {
        						echo '<p>';
        						the_sub_field('feature_description');
        						echo '</p>';
        					}
        					if(get_sub_field('small_text')) {
        						echo '<p><small>';
        						the_sub_field('small_text');
        						echo '</small></p>';
        					}
        					if(get_sub_field('feature_image')) {
        						echo '<div class="clearfix"></div>';
        					}
        					if( get_sub_field('custom_icon')) {
        						echo '</div>';
        					}
    					endwhile;
					else :
    				// no rows found
					endif;
					if(get_field('infographic_image')) {
					echo '</div></div><div class="column third">';
    					echo '<img src="';
    					the_field('infographic_image');
    					echo '" /></div>';					
					} 
					if (get_field('additional_paragraph')) { 
						echo '<p>';						
						the_field('additional_paragraph'); 
						echo '</p>';
						} 
					if (get_field('pdf_link')) { 
						echo '<div class="pdf-link talignleft"><a target="_blank" href="';
						the_field('pdf_link');
						echo '">';
						the_field('pdf_link_text'); 
						echo '</a></div>';
					} 	
					if( get_field('call_to_action') == 'Yes') {
						echo '<hr /><div class="callout-box">';
							if( get_field('cta_header')) {
								echo '<h4>';
								the_field('cta_header');
								echo '</h4>';
							}
							if( get_field('cta_text')) {
								echo '<p>';
								the_field('cta_text');
								echo '</p>';
							}
							if( get_field('cta_button_link')) {
								echo '<a class="button" href="';
								the_field('cta_button_link');
								echo '">&raquo;&nbsp;';
								if( get_field('cta_button_text')) {
									the_field('cta_button_text');
								}
								else {
									echo 'Go';
								}
								echo '</a>';
							}
						echo '</div>';
					}
					?>
			</div>
		</div>
<?php endwhile; endif; ?>
	<div class="column fourth">
		<?php get_sidebar('platform'); ?>
	</div>
	<hr/>
</div>
</main>
<?php get_footer(); ?>