<?php get_header(); ?>
<main class="page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $this_page_id = $post->ID; ?>
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/resources">Resources</a> / <?php if ( $post->post_parent > 0 ) { ?> <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a> /<?php } ?> <?php the_title(); ?></p>
				</div>
				<?php if ( $post->post_parent > 0 ) { ?>
				<h2><?php the_title(); ?></h2>
				<?php } ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<div class="column full">
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
				<?php query_posts(array('posts_per_page' => -1, 'paged' => $paged, 'post_type' => 'resources', 'post_parent' => $this_page_id, 'order' => 'DESC')); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="column fourth spacer">
					<div class="resource">
						<div class="ft-img">
							<a href="<?php the_permalink(); ?>">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} 
								?>
							</a>
						</div>
						<div class="resource-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo substr(get_the_excerpt(), 0,90); ?>...</p>
						</div>
						<hr/>						
						<?php if (autoc_get_postdata('pdf-upload')) { ?>
						<a class="btn" href="<?php autoc_get_postdata('pdf-upload'); ?>">Download</a>
						<?php } else { ?>
						<a class="btn" href="<?php the_permalink(); ?>">Learn More</a>
						<?php } ?>
					</div>
				</div>
			<?php endwhile; endif; ?>
			<div class="pagination">
				<p><?php echo paginate_links(); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="column fourth">
	<?php get_sidebar('solutions'); ?>
</div>
</div>
</main>
<?php get_footer(); ?>