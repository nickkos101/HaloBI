<?php get_header(); ?>
<main class="page blog">
    <div class="container">
        <div class="column three-fourths spacer">
            <div class="column full call-out">
                <div class="breadcrumbs">
                    <p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/prism-media-center">Prism Media Center</a> / News</p>
                </div>
                <h2>Halo Prism Videos</h2>
                <p>Welcome to the Halo Prism Video Page. Below you’ll find the latest tips and tricks, advanced tutorials and more for the Halo BI user interface. Select from any of the categories below to get started:</p>
                <ul>
                    <li><a href="#tips">Quick Tips and Tricks</a></li>
                    <li><a href="#train">Complete Training Series</a></li>
                </ul>
                <h4 id="tips">Quick Tips and Tricks</h4>
                <hr/>
                <div class="resources">
                    <?php query_posts(array('posts_per_page' => 25, 'media-categories' => 'quick-tips-tricks')); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="column fourth spacer">
                        <div class="resource">
                            <div class="ft-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/video.png">
                                </a>
                            </div>
                            <div class="resource-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_field('snippet_pararaph'); ?></p>
                                <hr/>
                                <p><a href="<?php the_permalink(); ?>">Watch</a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <h4 id="train">Complete Prism Training Series</h4>
                <hr/>
                <?php query_posts(array('posts_per_page' => 25, 'media-categories' => 'complete-training-series')); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="column fourth spacer">
                    <div class="resource">
                        <div class="ft-img">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/video.png">
                            </a>
                        </div>
                        <div class="resource-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_field('snippet_pararaph'); ?></p>
                            <hr/>
                            <p><a href="<?php the_permalink(); ?>">Watch</a></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>
<div class="column fourth">
    <?php get_sidebar('solutions'); ?>
</div>
</div>
</main>
<?php get_footer(); ?>