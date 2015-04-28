<?php get_header(); ?>
<main class="page blog">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column two-thirds spacer">
			<article>
				<div class="column full call-out">
					<div class="breadcrumbs">
						<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/blog"> Blog </a> / <?php the_title(); ?></p>
					</div>
					<h2><?php the_title(); ?></h2>
					<p><date>Posted On: <?php the_date(); ?></date></p>
					<?php the_content(); ?>
					<div class="gray-box">
						<div class="column third">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
							<h3><?php the_author(); ?></h3>
						</div>
						<div class="column two-thirds">
							<p><?php the_author_meta('description'); ?></p>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="column third">
			<?php get_sidebar('solutions'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>