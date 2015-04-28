<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Platform</p>
				</div>
			</div>
			<div class="column full">
					<h2>Enterprise-class Analytics and Intelligence without Enterprise-class Headaches</h2>
					<p>Halo BI combines traditional business intelligence with big data analytics and super-charges it with next generation visualization, collaboration and decision support tools helping everyone in your organization answer their most important business questions quickly, easily and cost effectively.</p>
			</div>
				<div class="column full">
					<?php query_posts(array( 'post_type' => 'platform-features', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
					<?php query_posts(array( 'post_type' => 'platform-features', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
								if( get_field('page_header')) {
									echo '<h4><a href="';
								the_permalink();
								echo '">';
								the_field('page_header');
								echo '</a></h4>';
								}
								echo '<p>';
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail();
								}
								if( get_field('summary_bold')) {
									echo '<strong>';
									the_field('summary_bold');
									echo '</strong>';
								}
								echo '</p><p>';
								the_field('summary');
								echo '</p>';
								echo '<a class="button" href="';
								the_permalink();
								echo '">&raquo; Learn More</a>';
								echo '</div>';
								$i++; endwhile; endif;
							?>
						</div>
					</div>

				</div>
			</div>
	<div class="column fourth">
		<?php get_sidebar('platform'); ?>
	</div>
</div>
</main>
<?php get_footer(); ?>