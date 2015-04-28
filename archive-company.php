<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Company</p>
				</div>
				<?php if (autoc_get_postdata('showtitle') != true) { ?><h2>Company</h2><?php } ?>
				<div class="ft-img">
					<img src="<?php echo get_template_directory_uri(); ?>/images/company.jpg" class="full">
				</div>
				<p><strong>For companies that rely on data, Halo BI delivers a database tool that simplifies data integration and improves quality and mobility by automating code development and maintenance.</strong></p>
				<p>Halo BI empowers food and beverage companies with purchasing & procurement, operational & production, inventory and sales analysis that yield actionable insights. Halo BI illuminates supply chain inefficiencies such as limited vendor effectiveness, operational problems, and other challenges connected to critical Inventory and Sales & Operations Planning problems.</p>
				<p>By synchronizing purchasing operations, inventory, and sales and marketing plans, Halo BI presents users with a consistent view of their business, providing an essential tool that enhances reduced costs, optimizes critical processes and improves customer service.</p>
				<?php query_posts(array('post_type' => 'company','post_parent' => 0, )); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="column half spacer">
					<p><a style="color:#393939; font-size:20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<p style="font-size:14px;"><?php the_field('snippet_pararaph'); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn">More</a>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<div class="column third">
		<?php get_sidebar('company'); ?>
	</div>
</div>
</main>
<?php get_footer(); ?>