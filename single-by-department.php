<?php get_header(); ?>
<main class="solution">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column three-fourths spacer">
			<div class="column full">
				<div class="breadcrumbs">
					<p><a href="/solutions">Solutions</a> / <a href="/by-department">By Department</a> / <?php if ( $post->post_parent > 0 ) { ?> <a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a> /<?php } ?> <?php the_title(); ?></p>
				</div>
			</div>
				<?php 
				echo '<div class="column full">';// check if the post has a Post Thumbnail assigned to it.
					echo '<h2>';
					if (get_field('page_header')) { 
						the_field('page_header'); 
					} 
					else { the_title(); 
					} 
					echo '</h2>';
					if (get_field('quick_description_bold_heading')) { 
						echo '<h3>';
						the_field('quick_description_bold_heading');
						echo '</h3>';
					}
					$quickdescription = get_field('quick_description');
					if ($quickdescription) {
						echo '<p>';
						echo $quickdescription;
						echo '</p>';
					}
					$qaheader = get_field('qa_heading');
					if ($qaheader) {
						echo '<h3>';
						echo $qaheader;
						echo '</h3>';
					}
					if( have_rows('questions_answers') ):
 						// loop through the rows of data
    					while ( have_rows('questions_answers') ) : the_row();
    					$question = get_sub_field('question');
    					$answer = get_sub_field('answer_paragraph');
    					$paragraph = get_sub_field('paragraph_after_bullets');
        				// display a sub field value
        					echo '<p>';
        					if($question) {
        						echo '<strong>';
        						echo $question;
        						echo '</strong>';
        					}
        					if($answer) {
        						echo '<br />';
        						echo $answer;
        					}
        					echo '</p>';
        					if( have_rows('qa_bullets_points')) {
        						echo '<ul>';
        						while( have_rows('qa_bullets_points')) {
        							the_row();
        							$bullets = get_sub_field('qa_bullet_point_item');
        							if($bullets) {
        							echo '<li>';
        							echo $bullets;
        							echo '</li>';
        						}
        						}
        						echo '</ul>';
        					}
        					if($paragraph) {
        						echo '<p>';
        						echo $paragraph;
        						echo '</p>';
        					}
    					endwhile;
						else :
    					// no rows found
					endif;

					$qaheader2 = get_field('qa_heading_two');
					if ($qaheader2) {
						echo '<h3>';
						echo $qaheader2;
						echo '</h3>';
					}
					if( have_rows('questions_answers_2') ):
 						// loop through the rows of data
    					while ( have_rows('questions_answers_2') ) : the_row();
    					$question2 = get_sub_field('question2');
    					$answer2 = get_sub_field('answer_paragraph2');
    					$paragraph2 = get_sub_field('paragraph_after_bullets2');
        				// display a sub field value
        					echo '<p>';
        					if($question2) {
        						echo '<strong>';
        						echo $question2;
        						echo '</strong>';
        					}
        					if($answer2) {
        						echo '<br />';
        						echo $answer2;
        					}
        					echo '</p>';
        					if( have_rows('qa_bullets_points2')) {
        						echo '<ul>';
        						while( have_rows('qa_bullets_points2')) {
        							the_row();
        							$bullets2 = get_sub_field('qa_bullet_point_item');
        							if($bullets2) {
        							echo '<li>';
        							echo $bullets2;
        							echo '</li>';
        							}
        						}
        						echo '</ul>';
        					}
        					if($paragraph2) {
        						echo '<p>';
        						echo $paragraph2;
        						echo '</p>';
        					}
    					endwhile;
						else :
    					// no rows found
					endif;
					if( in_array( 'Call To Action' , get_field('features') ) ) {

						echo '<hr /><div class="callout-box">';
						if( get_field('cta_header')) {
							echo '<h4>';
							the_field('cta_header');
							echo '</h4>';
						}
						if( get_field('cta_text')) {
							echo '<p>';
							the_field('cta_text');
							echo '</p>';
						}
						if( get_field('cta_button_link')) {
							echo '<a class="button" href="';
							the_field('cta_button_link');
							echo '">&raquo;&nbsp;';
							if( get_field('cta_button_text')) {
								the_field('cta_button_text');
							}
							else {
								echo 'Go';
							}
							echo '</a>';
						}
						echo '</div>';
					}
                echo '</div>';
                 ?>
		</div>
<?php endwhile; endif; ?>
	<div class="column fourth">
		<?php get_sidebar('platform'); ?>
	</div>
	<hr/>
	<?php get_template_part('subfooter') ?>
</div>
</main>
<?php get_footer(); ?>