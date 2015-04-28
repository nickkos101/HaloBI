<?php get_header(); ?>
<main class="page">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/resources">Resources</a> / <?php get_single_breadcrumb('galleries'); ?> / <?php the_title(); ?></p>
				</div>
				<?php if (autoc_get_postdata('showtitle') != true) { ?><h2><?php the_title(); ?></h2><?php } ?>
				<div class="ft-img">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>
				</div>
				<p><?php the_field('description'); ?></p>
				<?php foreach (get_field('videos') as $video) {
					echo '<h4>'.$video['video_title'].'</h4>';
					echo $video['youtube_embed'];
					echo '<p>'.$video['video_paragraph'].'</p>';
				} ?>
			</div>
		</div>
		<div class="column third">
			<?php get_sidebar('solutions'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>