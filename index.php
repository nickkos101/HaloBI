<?php get_header(); ?>
<main>
	<!-- Assume you build repeater custom fields for slides in theme options...  -->
	<div class="slider">
      	<?php // Start the repeater field loop
      	if ( have_rows('slider_images', 'option') ) : 
      		while ( have_rows('slider_images', 'option') ) : 
      			the_row(); 
				// build image object vars
      			$image = get_sub_field('image', 'option');
      			if($image) {
				$url = $image['url'];
      			}
      			$smallerimage = get_sub_field('small_image', 'option');
				if($smallerimage) {
					$smallerurl = $smallerimage['url'];
				}
      			$headline = get_sub_field('headline', 'option');
      			$caption = get_sub_field('caption', 'option');
				// large size
				$largesize = 'large';
				if($image) {
					$large = $url;
				}
				$smallerlargesize = 'large';
				if($smallerimage) {
				$smallerlarge = $smallerimage['sizes'][ $smallerlargesize ];
				}
				// medium size
				$mediumsize = 'medium';
				if($image) {
				$medium = $image['sizes'][ $mediumsize ];	
				}
				$smallermediumsize = 'medium';
				if($smallerimage) {
				$smallermedium = $smallerimage['sizes'][ $smallermediumsize ];
				}
      			?>
				<div class="slide" style="background-image: url(<?php  if( $image ) : /* Let's deliver smaller image sizes to mobile devices */ if ( wp_is_mobile() ) { echo $medium; } else { echo $large; } endif; ?>);">
					<?php  if( $headline ) : ?>
						<div class="overlay">
							<div class="container">
								<div class="column two-thirds">
									<div class="left-spacer top-spacer" >
										<h1><?php echo $headline;?></h1>
										<?php  if( $caption ) : ?>
											<p><?php echo $caption; ?></p>
										<?php endif; ?>
										<?php  if( $smallerimage ) : ?>
											<div class="column two-fifths">
											<img src="<?php /* Let's deliver smaller image sizes to mobile devices */ if ( wp_is_mobile() ) { echo $smallermedium; } else { echo $smallerlarge; } ?>" />
											</div>
										<?php endif; ?>										
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
    		<?php endwhile; ?>
    	<?php endif; ?>
    </div>
	<div class="blue-wrap">
		<div class="container hor-list taligncenter">
			<ul>
				<?php
				$integrations = get_field('integration_images', 'option');
				foreach ($integrations as $integration) {
					echo '<li><img src="'.$integration['url'].'"></li>';
				}
				?>
			</ul>
		</div>
	</div>
	<div class="container page-section spacer">
		<div class="column third spacer">
			<h3 class="taligncenter"><?php the_field('page_content_area_1_title', 'option'); ?></h3>
			<?php the_field('page_content_area_1_content', 'option'); ?>
			<p><a href="<?php the_field('page_content_area_1_link', 'option'); ?>">[Learn More]</a></p>
		</div>
		<div class="column third spacer">
				<h3 class="taligncenter"><?php the_field('page_content_area_2_title', 'option'); ?></h3>
			<?php the_field('page_content_area_2_content', 'option'); ?>
			<p><a href="<?php the_field('page_content_area_2_link', 'option'); ?>">[Learn More]</a></p>
		</div>
		<div class="column third spacer">
				<h3 class="taligncenter"><?php the_field('page_content_area_3_title', 'option'); ?></h3>
			<?php the_field('page_content_area_3_content', 'option'); ?>
			<p><a href="<?php the_field('page_content_area_3_link', 'option'); ?>">[Learn More]</a></p>
		</div>
	</div>
	<div class="container">
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<h2>How Mature is your Business Inteligence?</h2>
				<img class="alignright third" src="<?php echo get_template_directory_uri(); ?>/images/large-mat-model.png">
				<p>To help you assess your BI implementation and develop a roadmap for the future, Halo BI has developed the Halo Business Intelligence Maturity Model™.</p>
				<p>The Halo BI Maturity Model allows you to evaluate the state of your company's BI maturity on four dimensions: Data, Analytics, Collaboration and Dissemination.</p>
				<a class="btn">Take the Assessment!</a>
			</div>
			<div class="column full blog">
				<h2>Halo BI Blog</h2>
				<article>
					<h5><a href="">How to Know Your Cash Flow, When You Don’t Know Your Cash Flow</a></h5>
					<p>One of our customers, a top rent-to-own company, faced a challenging problem. There was a serious disconnect between the customer acquisition targets of the local stores and cash flow planning being done at corporate headquarters. This disconnect made it impossible to accurately forecast cash flow and in turn led to mistimed promotions and poor inventory... <a href="">[read more]</a></p>
				</article>
				<article>
					<h5><a href="">How to Know Your Market, When You Don’t Know Your Market</a></h5>
					<p>One of our customers, a top craft brewer, faced a challenging problem. With the exception of a few direct outlets for their beer, their restaurants, they had no way of determining product demand for seasonal brews and their base products. Interestingly, they are not alone with this issue as producers of alcoholic beverages in the... <a href="">[read more]</a></p>
				</article>
				<article>
					<h5><a href="">Infographic: Data Quality in BI the Costs and Benefits</a></h5>
					<p>It’s a dirty (not so little, not so secret) secret that most organization’s systems are chocked full of erroneous, missing and incomplete data. But when you’ve got dirty data all you’ve got is bad business intelligence. Here’s an infographic with the costs and benefits of data quality in BI. Click here for the PDF version... <a href="">[read more]</a></p>
				</article>
				<a class="btn">More Blogs</a>
			</div>
		</div>
		<div class="column third spacer">
			<aside>
				<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
				<!--<div class="widget">
					<h6>Featured White Paper</h6>
					<img class="alignleft third" src="<?php echo get_template_directory_uri(); ?>/images/prism-doc.png">
					<p><a href="">Supply Chain KPI's</a></p>
					<p>Go beyond canned KPI’s and pre-built analytics and understand your business the way that makes the most sense to you.</p>
					<a class="btn">Download Here</a>
				</div>
				<div class="widget">
					<h6>Halo News</h6>
					<p><a href="">Halo Announces Cloud-Based Retail Loss Prevention Application based on Behavioral Patterns</a></p>
					<p>Halo Cash Alert identifies patterns in point-of-sale cash takings that can be indicative of theft or misuse San Diego, CA (PRWEB) March 13, 2015. Halo (halobi.com), a leading provider of business application software, announced Halo Cash Alert Version 1.2, designed to help quickly identify patterns in point-of-sale cash takings that can be indicative of theft... <a href="">[read more]</a></p>
					<a class="btn">More News</a>
				</div>
				<div class="widget">
					<h6>Become a Halo Partner</h6>
					<img class="alignleft third" src="<?php echo get_template_directory_uri(); ?>/images/harp.png">
					<p>Join our world class partner program and help your customers succeed with better business intelligence.<a href="">[read more]</a></p>
					<a class="btn">Learn More</a>
				</div>
				<div class="widget">
					<h6>Socialize with Halo</h6>
					<div class="social-media">
						<ul>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="rss"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="twitter"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/google.png" alt="google plus"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="linkedin"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="youtube"></a></li>
							<li><a><img src="<?php echo get_template_directory_uri(); ?>/images/scoopit.png" alt="scoopit"></a></li>
						</ul>
					</div>
				</div>-->
			</aside>
		</div>
		<hr/>
		<div class="column full spacer">
			<div class="companies">
				<h3>Data driven companies trust Halo BI</h3>
				<div class="scroller">
					<?php
					$clients = get_field('client_and_partner_images', 'option');
					foreach ($clients as $client) {
						echo '<div><img src="'.$client['url'].'"></div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>