<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Data Connectors</p>
				</div>
			</div>
			<div class="column full">
				<h2>Access all the Data Inside your Enterprise</h2>
			</div>
			<div class="column full">
				<div class="column-spacer-right">
					<p><small>From simple flat files to multi-terabyte data warehouses and big data, Halo BI lets you use all your data to build the best insights and analytics for everyone in your organization.</small></p>
					<hr/>
				</div>
			</div>
			<div class="column full">
				<?php query_posts(array( 'post_type' => 'data-connectors', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
				<div class="column third tabs">
					<div class="spacer">
						<ul>
							<?php 
							$i = 0;
							if ( have_posts() ) : while ( have_posts() ) : the_post();
							if($i == 0) {
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
							the_title();
							echo '</li>';
							$i++; endwhile; endif;
							wp_reset_query();
							?>
						</ul>
					</div>
				</div>
				<?php query_posts(array( 'post_type' => 'data-connectors', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
				<div class="column two-thirds tabbed">
					<div class="spacer">
						<?php 
						$i = 0;
						if ( have_posts() ) : while ( have_posts() ) : the_post();
						if($i == 0) {
							echo '<div class="tab active">';
						}
						else {
							echo '<div class="tab">';
						}
						echo '<h4><a href="';
						the_permalink();
						echo '">';
						the_field('page_header');
						echo '</a></h4>';
						echo '<p>';
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail();
								}
								echo '</p>';
								echo '<p>'.get_field('summary').'</p>';
								if (get_the_title() !== 'Other Data Sources') {
									echo '<a class="button" href="';
									the_permalink();
									echo '">&raquo; Learn More</a>';
								}
								echo '</div>';
								$i++; endwhile; endif;
								?>
							</div>
						</div>

					</div>
				</div>
				<div class="column fourth">
					<?php get_sidebar('solutions'); ?>
				</div>
			</div>
		</main>
		<?php get_footer(); ?>