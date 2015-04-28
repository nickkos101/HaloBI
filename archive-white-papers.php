<?php get_header(); ?>
<main class="page blog">
    <div class="container">
        <div class="column two-thirds spacer">
            <div class="column full call-out">
                <div class="breadcrumbs">
                    <p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/resources">Resources</a> / White Papers</p>
                </div>
                <h2>White Papers</h2>
                <div class="resources">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="column fourth spacer">
                        <div class="resource">
                            <div class="ft-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/prism-doc.png">
                                </a>
                            </div>
                            <div class="resource-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <hr/>
                            <p><a href="<?php the_permalink(); ?>" >Download</a> (PDF)</p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <div class="column third">
        <?php get_sidebar('solutions'); ?>
    </div>
</div>
</main>
<?php get_footer(); ?>