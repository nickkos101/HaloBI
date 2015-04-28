<?php /* Template Name: Tabbed Page */ 
get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column two-thirds spacer">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <?php the_title(); ?></p>
				</div>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<div class="column third tabs">
					<div class="spacer">
						<ul>
							<?php if (autoc_get_postdata('tab1title')) { ?><li class="active"><?php echo autoc_get_postdata('tab1title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab2title')) { ?><li><?php echo autoc_get_postdata('tab2title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab3title')) { ?><li><?php echo autoc_get_postdata('tab3title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab4title')) { ?><li><?php echo autoc_get_postdata('tab4title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab5title')) { ?><li><?php echo autoc_get_postdata('tab5title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab6title')) { ?><li><?php echo autoc_get_postdata('tab6title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab7title')) { ?><li><?php echo autoc_get_postdata('tab7title'); ?></li><?php } ?>
							<?php if (autoc_get_postdata('tab8title')) { ?><li><?php echo autoc_get_postdata('tab8title'); ?></li><?php } ?>
						</ul>
					</div>
				</div>
				<div class="column two-thirds tabbed">
					<div class="spacer">
						<?php if (autoc_get_postdata('tab1content')) { ?>
						<div class="tab active">
							<?php echo autoc_get_postdata('tab1content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab2content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab2content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab3content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab3content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab4content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab4content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab5content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab5content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab6content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab6content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab7content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab7content'); ?>
						</div>
						<?php } ?>
						<?php if (autoc_get_postdata('tab8content')) { ?>
						<div class="tab">
							<?php echo autoc_get_postdata('tab8content'); ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		</div>
		<div class="column third">
			<?php get_sidebar('solutions'); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>