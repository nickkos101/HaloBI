<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Supply Chain Solutions</p>
				</div>
			</div>
			<div class="column full">
					<h2>Real Solutions to Real Supply Chain Problems</h2>
			</div>
			<div class="column two-thirds">
				<div class="column-spacer-right">
					<h5>Supply chain information management and analytics are an important element in supply chain management.</h5>
					<p><small>Access to trends, metrics and key performance indicators is a vital component of data-driven decision making in key areas such as procurement, finance, inventory and sales. Through a wide range of embedded methods and tools like predictive, descriptive and prescriptive analytics, Halo BI empowers executives to efficiently manage demand and supply networks and to make informed decisions about strategic supply chain management, capacity planning, demand-supply matching, sales and operations.</small></p>
				</div>
			</div>
			<div class="column third">
					<img src="<?php echo get_template_directory_uri(); ?>/images/solutions.jpg" alt="Halo Business Intelligence Supply Chain Solutions" />
			</div>

				<div class="column full">
					<?php query_posts(array( 'post_type' => 'solutions', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
										$onewordvalue = get_the_title();
										$arr = explode(' ',trim($onewordvalue));
										echo $arr[0];
										echo '</li>';
								$i++; endwhile; endif;
								wp_reset_query();
								?>
							</ul>
						</div>
					</div>
					<?php query_posts(array( 'post_type' => 'solutions', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
								the_title();
								echo '</a></h4>';
								echo '<p>';
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail();
								}
								the_field('summary');
								echo '</p>';
								echo '<a class="button" href="';
								the_permalink();
								echo '">&raquo; Learn More</a>';
								if(get_the_id() != 22047) {
								echo '<h5 class="taligncenter row-spacer"><strong>Prepackaged Applications for ';
								$onewordvalue = get_the_title();
								$arr = explode(' ',trim($onewordvalue));
								echo $arr[0];
								echo '</strong></h5>';
								$this_cpt_id = get_the_id();
								$test = new WP_Query(array('showposts' => 20, 'post_parent' => $this_cpt_id, 'orderby' => 'menu_order' , 'post_type' => 'solutions' , 'order'   => 'ASC')); 
								if ( $test->have_posts() ) :
								while ($test->have_posts()) : 
								$test->the_post();
								echo '<a class="white-box" href="';
								echo the_permalink();
								echo '">';
								echo the_title();
								echo '</a>';
								endwhile; endif;
								$test2 = new WP_Query(array('showposts' => 1, 'post_type' => 'platform-features' , 'post_title' => 'Predictive Analytics')); 
								if ( $test2->have_posts() ) :
								while ($test2->have_posts()) : 
								$test2->the_post();
								echo '<a class="white-box" href="';
								echo the_permalink();
								echo '">Forecasting</a>';
								endwhile; endif;
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