<?php get_header(); ?>
<main class="page">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <?php the_title(); ?></p>
				</div>
				<?php if (autoc_get_postdata('showtitle') != true) { ?><h2><?php the_title(); ?></h2><?php } ?>
				<div class="ft-img">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>
				</div>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="column third">
			<?php get_sidebar('solutions'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>