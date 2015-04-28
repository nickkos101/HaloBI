<?php get_header(); ?>
<main class="solution">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="/solutions">Solutions</a> / <?php if ( $post->post_parent > 0 ) { ?> <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a> /<?php } ?> <?php the_title(); ?></p>
				</div>
			</div>
			<?php //If child, display the following
				if ( $post->post_parent > 0 ) { 
			?>

			<div class="column three-fourths">
				<h2><?php 
					if (get_field('page_header')) { 
						the_field('page_header'); 
					} 
					else { 
						the_title(); 
					} ?>
				</h2>
				<?php 
					if (get_field('quick_description')) { 
						echo '<p>';
						the_field('quick_description');
						echo '</p>';
					} 
					?>
			</div>
			<div class="column fourth taligncenter">
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
					} 
				?>
			</div>
			<div class="column full">
				<!-- 
				Adding Key Business Areas Addressed 
				-->
				<?php // check if the repeater field has rows of data
				if( have_rows('key_business_problems_addressed') ):
				echo '<h3>Key Business Problems Addressed</h3>';
				if( count( get_field('key_business_problems_addressed') ) > 3 ) {
				echo '<ul class="column half columns-alpha" data-columns="2">';
				}
				else {
				echo '<ul>';
				}
 				// loop through the rows of data
    			while ( have_rows('key_business_problems_addressed') ) : the_row();
        		// display a sub field value
        		echo '<li>';
        		the_sub_field('problem_name');
        		echo '</li>';
    			endwhile;
				echo '</ul>';
				else :
    			// no rows found
				endif;
				?>
				<!-- 
				Adding Screenshot
				-->
				<?php if( get_field('screenshot') ): ?>
				<img src="<?php the_field('screenshot'); ?>" />
				<?php endif; ?>
				<!-- 
				Adding Benefits 
				-->
				<?php // check if the repeater field has rows of data
				if( have_rows('benefits') ):
				echo '<h4>Benefits:</h4>';
				echo '<ul>';
 				// loop through the rows of data
    			while ( have_rows('benefits') ) : the_row();
        		// display a sub field value
        		echo '<li>';
        		the_sub_field('benefit_name');
        		echo '</li>';
    			endwhile;
				echo '</ul>';
				else :
    			// no rows found
				endif;
				?>
				<!-- 
				Adding Available Analytics 
				-->
				<?php // check if the repeater field has rows of data
				if( have_rows('available_analytics') ):
				echo '<h4>Available Analytics:</h4>';
				if( count( get_field('available_analytics') ) > 3 ) {
				echo '<ul class="column half columns" data-columns="2">';
				}
				else {
				echo '<ul>';
				}
 				// loop through the rows of data
    			while ( have_rows('available_analytics') ) : the_row();
        		// display a sub field value
        		echo '<li>';
        		the_sub_field('analytics_name');
        		echo '</li>';
    			endwhile;
				echo '</ul>';
				else :
    			// no rows found
				endif;
				?>
				<?php
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
			echo '</div>';

				?>
			<?php 	//If parent, show following info instead
			} else {
				echo '<div class="column full">';
					if(get_field('show_featured_image') == 'Yes') {
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						echo '<div class="feature-block">';
						the_post_thumbnail();
						echo '</div>';
						} 
					}
					echo '<h2>';
					if (get_field('page_header')) { 
						the_field('page_header'); 
					} 
					else { the_title(); 
					} 
					echo '</h2>';
					if (get_field('quick_description')) { 
						echo '<p>';
						the_field('quick_description');
						echo '</p>';
					}
					if (get_field('continued_description')) {
						echo '<p>';
						the_field('continued_description');
						echo '</p>';
					}
					if (get_field('extra_paragraph')) {
						echo '<p><small>';
						the_field('extra_paragraph');
						echo '</small></p>';
					}
					if( have_rows('key_business_problems_addressed') ):
						echo '<ul style="clear: both;">';
 						// loop through the rows of data
    					while ( have_rows('key_business_problems_addressed') ) : the_row();
        				// display a sub field value
        					echo '<li>';
        					the_sub_field('problem_name');
        					echo '</li>';
    					endwhile;
						echo '</ul>';
						else :
    					// no rows found
					endif;
					if( have_rows('simple_features') ):
 						// loop through the rows of data
    					while ( have_rows('simple_features') ) : the_row();
        				// display a sub field value
        					if(get_sub_field('simple_heading')) {
        					echo '<h3>';
        					the_sub_field('simple_heading');
        					echo '</h3>';
        					}
        					if(get_sub_field('simple_paragraph')) {
        					echo '<p>';
        					the_sub_field('simple_paragraph');
        					echo '</p>';
        					}
    					endwhile;
						else :
    					// no rows found
					endif;
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
					$this_cpt_id=$post->ID;
					query_posts(array('showposts' => 20, 'post_parent' => $this_cpt_id, 'orderby' => 'menu_order' , 'post_type' => 'solutions' , 'order'   => 'ASC')); 
					if ( have_posts() ) :
					while (have_posts()) : 
					the_post();
					echo '<div class="row-spacer"><div class="column fifth">';
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
					} 
					echo '</div>';
					echo '<div class="column four-fifths">';
					echo '<h4>';
					the_title();
					echo '</h4>';
					if (get_field('summary')) { 
					echo '<p>';
					the_field('summary');
					echo '&nbsp;<a href="';
					the_permalink();
					echo '">[Learn More]</a>';
					echo '</p>';
					}
					else {
					echo '<p>';
					the_field('quick_description'); 
					echo '&nbsp;<a href="';
					the_permalink();
					echo '">[Learn More]</a>';
					echo '</p>';	
					}
					echo '</div></div>';
					endwhile; endif;
					wp_reset_query();
                echo '</div>';
                } ?>
		</div>
<?php endwhile; endif; ?>
	<div class="column fourth">
		<?php get_sidebar('solutions'); ?>
	</div>
	<hr/>
</div>
</main>
<?php get_footer(); ?>