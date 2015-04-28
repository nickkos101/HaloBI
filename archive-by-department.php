<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="<?php echo get_site_url(); ?>/solutions">Solutions</a> / By Department</p>
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
					<?php query_posts(array( 'post_type' => 'by-department', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
					<?php query_posts(array( 'post_type' => 'by-department', 'post_parent' => 0 , 'orderby' => 'menu_order' , 'order'   => 'ASC' ) ); ?>
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
								$featureimage = get_field('image_upload');
								if ( $featureimage ) { // check if the post has a Post Thumbnail assigned to it.
									echo '<img src="';
									echo $featureimage;
									echo '" />';
								}
								the_field('quick_description');
								echo '</p>';
                        		$moreinfo = get_field('more_info'); if($moreinfo) {
                        		echo '<p>';
                        		echo preg_replace('/\s+?(\S+)?$/', '', substr($moreinfo, 0, 201)). "...";
                        		echo '</p>';
                        		}
								echo '<p>';
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