<?php get_header(); ?>
<main class="solution">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="/solutions">Solutions</a> / <a href="/by-industry">By Industry</a> / <?php if ( $post->post_parent > 0 ) { ?> <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a> /<?php } ?> <?php the_title(); ?></p>
				</div>
			</div>
			<?php //If child, display the following
				if ( $post->post_parent > 0 ) { 
			?>

			<div class="column full">
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
					<?php	if( have_rows('relevant_kpis')) :
							echo '<h4>List of Relevant KPIs</h4>';
							echo '<ul>';
							while( have_rows('relevant_kpis')) :
								the_row();
								echo '<li class="bigpad">';
								$kpimain = get_sub_field('main_point');
								if($kpimain) {
									echo '<span class="underline">';
									echo $kpimain;
									echo '</span> - ';
								}
								$kpidesc = get_sub_field('point_description');
								if($kpidesc) {
									echo $kpidesc;
								}
								echo '</li>';
							endwhile;
							echo '</ul>';
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

				?>

		</div>
			<?php 	//If parent, show following info instead
			} else {
				echo '<div class="column full">';// check if the post has a Post Thumbnail assigned to it.
					echo '<h2>';
					if (get_field('page_header')) { 
						the_field('page_header'); 
					} 
					else { the_title(); 
					} 
					echo '</h2>';
					if (get_field('quick_description')) { 
						echo '<h3>';
						the_field('quick_description');
						echo '</h3>';
					}
					$featureimage = get_field('image_upload');
					if ( $featureimage ) { // check if the post has a Post Thumbnail assigned to it.
					echo '<div class="feature-block">';
					echo '<img src="';
					echo $featureimage;
					echo '" />';
					echo '</div>';
					} 
					if (get_field('more_info')) {
						echo '<p>';
						the_field('more_info');
						echo '</p>';
					}
					if (get_field('bullet_point_heading')) {
						echo '<p><strong>';
						the_field('bullet_point_heading');
						echo '</strong></p>';
					}
					if( have_rows('bullet_points') ):
						echo '<ul style="clear: both;">';
 						// loop through the rows of data
    					while ( have_rows('bullet_points') ) : the_row();
        				// display a sub field value
        					echo '<li>';
        					the_sub_field('bullet_point_item');
        					echo '</li>';
    					endwhile;
						echo '</ul>';
						else :
    					// no rows found
					endif;
						if( have_rows('relevant_kpis')) :
							echo '<h4>List of Relevant KPIs</h4>';
							echo '<ul>';
							while( have_rows('relevant_kpis')) :
								the_row();
								echo '<li class="bigpad">';
								$kpimain = get_sub_field('main_point');
								if($kpimain) {
									echo '<span class="underline">';
									echo $kpimain;
									echo '</span> - ';
								}
								$kpidesc = get_sub_field('point_description');
								if($kpidesc) {
									echo $kpidesc;
								}
								echo '</li>';
							endwhile;
							echo '</ul>';
						endif;
						$loopheading = get_field('loop_heading');
						if($loopheading) {
							echo '<p><strong>';
							echo $loopheading;
							echo '</strong></p>';
						}
					$this_cpt_id_now=$post->ID;
					query_posts(array('showposts' => 20, 'post_parent' => $this_cpt_id_now, 'orderby' => 'menu_order' , 'post_type' => 'by-industry' , 'order'   => 'ASC')); 
					if ( have_posts() ) :
						echo '<ul>';
					while (have_posts()) : 
					the_post();
						echo '<li><a href="';
						echo the_permalink();
						echo '">';
						the_title();
						echo '</a></li>';
					endwhile;
						echo '</ul>';
					endif;
					wp_reset_query();

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
                } ?>
		</div>
<?php endwhile; endif; ?>
	<div class="column fourth">
		<?php get_sidebar('platform'); ?>
	</div>
	<hr/>
	<?php get_template_part('subfooter') ?>
</div>
</main>
<?php get_footer(); ?>