<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="<?php echo get_post_type_archive_link('data-connectors'); ?> ">Data Connectors</a> / <?php the_title(); ?> </p>
				</div>
			</div>
			<div class="column full">
				<h2><?php the_field('page_header'); ?></h2>
			</div>
			<div class="column full">
				<div class="column-spacer-right">
					<?php the_post_thumbnail('medium', array('class' => 'alignright')); ?>
					<p><small><?php the_field('summary'); ?></small></p>
					<?php if (get_field('add_italic_text_continued_description') == 'Yes') { ?>
					<p><i><?php the_field('continued_description'); ?></i></p>
					<?php } ?>
					<hr/>
					<?php $id = get_field('resources')[0]->ID;
					foreach (get_field('additional_uploads', $id) as $pdf) {
						?>
						<div class="column fourth spacer">
							<div class="resource">
								<div class="ft-img">
									<a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/prism-doc.png">
									</a>
								</div>
								<div class="resource-content">
									<h3><a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>"><?php echo $pdf['upload_title']; ?></a></h3>
									<?php echo $pdf['upload_description']; ?>
								</div>
								<hr>
								<p><a href="<?php echo $pdf['upload_pdf_upload']['url']; ?>" class="btn">Learn More</a></p>
							</div>
						</div>
						<?php
					} 
					?>
				<!--<?php 
					foreach (get_field('main_points') as $point) {
						echo '<h3>'.$point['feature_title'].'</h3>';
						echo $point['feature_description'];
						if ($point['add_video_embed'] == 'Yes') {
							echo $point['video_embed'];
						}
					}
					?>-->
				</div>
			</div>
		</div>
		<div class="column fourth">
			<?php get_sidebar('platform'); ?>
		</div>
		<hr/>
		<?php get_template_part('subfooter'); ?>
	</div>
</main>
<?php get_footer(); ?>