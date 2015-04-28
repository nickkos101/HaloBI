<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column two-thirds spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / Support</p>
				</div>
				<?php query_posts(array('post_type' => 'support','post_parent' => 0, "s" => 'Support Info' )); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $pageheader = get_field('page_header'); $quickdescription = get_field('quick_description'); $messagehead = get_field('message_header'); $message = get_field('message'); ?>
				<?php if($pageheader) {
					echo '<h2>';
					echo $pageheader;
					echo '</h2>';
				}
				?>
				<?php if($quickdescription) {
					echo '<p>';
					echo $quickdescription;
					echo '</p>';
				}
				?>
				<?php if( have_rows('contact_info')) : ?>
				<table style="width:100%;">
					<thead>
						<td>Region</td>
						<td>Telephone</td>
						<td>Email</td>
					</thead>
					<tbody>
							<?php while(have_rows('contact_info')) : the_row(); ?>
							<tr>
							<?php $region = get_sub_field('technical_support'); $telephone = get_sub_field('telephone'); $email = get_sub_field('email'); ?>
							<td>
							<?php if($region) {
							echo $region;
							} ?>
							</td>
							<td>
							<?php if($telephone) {
							echo $telephone;
							} ?>
							</td>
							<td>
							<?php if($email) {
							echo $email;
							} ?>
							</td>
							</tr>
						<?php endwhile; ?>
				</table>
				<?php endif; ?>
				<?php if($messagehead) {
					echo '<h3>';
					echo $messagehead;
					echo '</h3>';
				}
				?>
				<?php if($message) {
					echo '<p>';
					echo $message;
					echo '</p>';
				}
				?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<div class="column third">
		<?php get_sidebar('company'); ?>
	</div>
</div>
</main>
<?php get_footer(); ?>