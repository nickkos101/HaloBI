<?php get_header(); ?>
<main class="page">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/resources">Resources</a> / <?php the_title(); ?></p>
				</div>
				<p><?php the_field('description'); ?></p>
				<div class="resources">
					<?php foreach (get_field('additional_uploads') as $pdf) { ?>
					<div class="column fourth spacer">
						<div class="resource">
							<div class="ft-img">
								<a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/prism-doc.png">
								</a>
							</div>
							<div class="resource-content">
								<h3><a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>"><?php echo $pdf['upload_title']; ?></a></h3>
								<p><?php echo $pdf['upload_description']; ?></p>
							</div>
							<hr/>
							<p><a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>" >Watch Video</a></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="column fourth">
			<?php get_sidebar('solutions'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>