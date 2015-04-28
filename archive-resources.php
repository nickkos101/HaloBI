<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Resources</p>
				</div>
				<h2>Halo Business Intelligence Resource Center</h2>
				<p>Welcome to the Halo Business Intelligence Resource Center. Below you’ll find featured assets from Halo’s print and video libraries, including product brochures, webinars and demos, customer testimonials and much more.</p>
				<div class="column full resources taligncenter spacer">
					<h3 class="talignleft">Print Resources</h3>
					<p class="talignleft"><a href="">See All Print Resources</a></p>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/print-types/case-studies">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-case.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/print-types/case-studies">Case Studies</a></h3>
								<p>Thousands of users around the world depend on Halo to make confident, data driven decisions.</p>
							</div>
							<hr/>
							<p><a href="/print-types/case-studies" class="btn">Read Case Studies</a></p>
						</div>
					</div>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/print-types/brochures-and-datasheets">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-data.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/print-types/brochures-and-datasheets">Datasheets &amp; Brochures</a></h3>
								<p>Everything you need to know about the Halo Business Intelligence platform.</p>
							</div>
							<hr/>
							<p><a href="/print-types/brochures-and-datasheets" class="btn">Download Brochures</a></p>
						</div>
					</div>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/white-papers">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-white.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/white-papers">White Papers</a></h3>
								<p>Read about business intelligence methodology, the latest in analytics, and much more.</p>
							</div>
							<hr/>
							<p><a href="/white-papers" class="btn">Read White Papers</a></p>
						</div>
					</div>
					<h3 class="talignleft">Video Resources</h3>
					<p class="talignleft"><a href="/resources/video-gallery">See All Video Resources</a></p>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/galleries/customer-stories">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-testimonials.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/galleries/customer-stories">Customer Stories</a></h3>
								<p>Read about business intelligence methodology, the latest in analytics, and much more.</p>
							</div>
							<hr/>
							<p><a href="/galleries/customer-stories" class="btn">Read Customer Stories</a></p>
						</div>
					</div>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/galleries/tours">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-testimonials.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/galleries/tours">Product Tours and Demonstrations</a></h3>
								<p>Learn more about Halo BI through informational video tours.</p>
							</div>
							<hr/>
							<p><a href="/galleries/tours" class="btn">Watch Product Tours</a></p>
						</div>
					</div>
					<div class="column third spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="/webinars">
									<img src="<?php echo get_template_directory_uri(); ?>/images/new-webinar.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="/webinars">Halo Webinars</a></h3>
								<p>Watch online presentations from BI thought leaders and Halo experts.</p>
							</div>
							<hr/>
							<p><a href="/webinars" class="btn">Watch Webinars</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="column fourth">
			<?php get_sidebar('resources'); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>