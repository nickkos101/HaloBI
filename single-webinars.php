<?php get_header(); ?>
<main class="page">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/resources">Resources</a> / <a href="/webinars">Webinars</a> / <?php the_title(); ?></p>
				</div>
				<?php if (autoc_get_postdata('showtitle') != true) { ?><h4><?php the_field('heading_text'); ?></h4><?php } ?>
				<img src="<?php the_field('image_upload'); ?>" class="alignleft">
				<p><?php the_field('heading_paragraph'); ?></p>
				<?php 
				if (get_field('add_bullet_points') == 'Yes') {
					echo '<ul>';
					foreach (get_field('bullet_points') as $bullet) {
						echo '<li>'.$bullet['bullet'].'</li>';
					}
					echo '</ul>';
				}
				?>
				<?php the_field('form_iframe'); ?>
			</div>
		</div>
		<div class="column fourth">
			<?php get_sidebar('webinars'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>