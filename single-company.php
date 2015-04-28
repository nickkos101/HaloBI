<?php get_header(); ?>
<main class="page">
	<div class="container">
		<div class="column three-fourths spacer">
			<div class="column full call-out">
				<div class="breadcrumbs">
					<p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/company">Company</a> / <?php the_title(); ?></p>
				</div>
				<?php if (get_field('features')[0] == 'Careers Archive') { ?>
				<h2><?php the_field('careers_header'); ?></h2>
				<h3><?php the_field('careers_sub_header'); ?></h3>
				<p><?php the_field('careers_quick_description'); ?></p>
				<p><?php the_field('careers_full_description'); ?></p>
				<h3>Current Openings</h3>
				<?php $id = get_the_ID(); ?>
				<?php query_posts(array('post_type' => 'company','post_parent' => $id, )); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="column full job">
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<p style="font-size:14px;"><?php the_field('snippet_pararaph'); ?></p>
					<p>[ <a href="<?php the_permalink(); ?>">More</a> ]</p>
				</div>
			<?php endwhile; endif; ?>
			<?php } ?>
			<?php if (get_field('features')[0] == 'Management Archive') { ?>
			<p><?php the_field('management_paragraph'); ?></p>
			<?php $id = get_the_ID(); ?>
			<?php query_posts(array('post_type' => 'company', 'orderby' => 'menu_order' , 'order' => 'ASC' , 'post_parent' => $id )); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="column full job">
				<h3><?php the_title(); ?></h3>
				<?php foreach(get_field('positions_people') as $person) { 
					echo '<p><strong>'.$person['position'].'</strong></p>';
					echo '<p><span>'.$person['description'].'</span></p>';
				} ?>				
			</div>
		<?php endwhile; endif; ?>
		<?php } ?>
		<?php if (get_field('features')[0] == 'Partners') { ?>
		<img src="<?php the_field('partners_image'); ?>" class="alignright">
		<h2><?php the_field('partners_title'); ?></h2>
		<p><?php the_field('partners_quick_description'); ?></p>
		<p><?php the_field('partners_paragraph'); ?></p>
		<hr/>
		<p><?php the_field('partners_video_paragraph'); ?> - <a href="<?php the_field('partners_video_link'); ?>">Watch Video</a></p>
		<p><strong><?php the_field('partners_form_title'); ?></strong></p>
		<?php the_field('partners_form_code'); ?>
		<?php } ?>
		<?php if (get_field('features')[0] == 'Media Center') { ?>
		<h2><?php the_title(); ?></h2>
		<p><?php the_field('halo_bi_backgrounder'); ?></p>
		<p><strong>Management Profiles</strong></p>
		<p><?php the_field('management_profiles'); ?></p>
		<p><strong>Logo</strong></p>
		<p><?php the_field('logo_paragraph'); ?></p>
		<p><b>Coporate &amp; Product Logo</b></p>
		<img width="250" src="<?php the_field('corportate_&_product_logo'); ?>">
		<ul style="padding-left:0px; list-style-position:inside;">
			<?php foreach(get_field('logo_links') as $logo_data) { ?>
			<li><a href="<?php echo $logo_data['logo_link']; ?>"><?php echo $logo_data['logo_title']; ?></a> - <?php echo $logo_data['logo_details_instructions']; ?></li>
			<?php } ?>
		</ul>
		<hr/>
		<p><strong>Media Contact Information</strong></p>
		<p>t: <?php the_field('media_contact_telephone'); ?></p>
		<p>e: <a href="mailto:<?php the_field('media_contact_email'); ?>"><?php the_field('media_contact_email'); ?></a></p>
		<?php } ?>
	</div>
</div>
<div class="column fourth">
	<?php get_sidebar('company'); ?>
</div>
</div>
</main>
<?php get_footer(); ?>