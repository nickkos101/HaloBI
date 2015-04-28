<?php /* Template Name: Resources Page */ 
get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Resources</p>
				</div>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="column third">
			<?php get_sidebar('solutions'); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>