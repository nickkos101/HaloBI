<?php get_header(); ?>
<main class="page blog">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<article>
				<div class="column full call-out">
					<div class="breadcrumbs">
						<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/prism-media-center"> Prism Media Center </a> / <?php
						if (in_array('Video', get_field('features'))) {
							echo '<a href="/media-categories/videos/">Videos</a>';
						}
						elseif (in_array('News', get_field('features'))) {
							echo '<a href="/media-categories/latest-news/">Latest News</a>';
						}
						?>  / <?php the_title(); ?></p>
					</div>
					<?php if (!in_array('Support', get_field('features'))) { ?>
					<h2><?php the_title(); ?></h2>
					<p><date>Posted On: <?php the_date(); ?></date></p>
					<?php } ?>
					<?php the_field('news_paragraph'); ?>
					<?php 
					if (get_field('video_block')) {
						foreach (get_field('video_block') as $video) {
							echo '<h4>'.$video['video_title'].'</h4>';
							echo '<p>'.$video['video_paragraph'].'</p>';
							echo $video['youtube_link'];
						}
					}
					?>
					<?php if (in_array('Support', get_field('features'))) {
						echo '<h4>'.get_field('support_page_title').'</h4>';
						echo '<p>'.get_field('support_page_paragraph').'</p>';
						echo '<table><thead><th>Technical Support</th><th>Telephone</th><th>Email</th></thead>';
						foreach (get_field('support_contact_info') as $number) {
							echo '<tr>';
								echo '<td>'.$number['technical_support'].'</td>';
								echo '<td>'.$number['support_telephone'].'</td>';
								echo '<td><a href="mailto:'.$number['support_email'].'">'.$number['support_email'].'</a></td>';
							echo '</tr>';

						}
						echo '</table>';
						echo '<h4>'.get_field('title_below_contact_numbers').'</h4>';
						echo '<p>'.get_field('paragraph_below_contact_numbers').'</p>';
					} ?>
				</div>
			</article>
		</div>
		<div class="column fourth">
			<?php get_sidebar('solutions'); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</main>
<?php get_footer(); ?>


?>