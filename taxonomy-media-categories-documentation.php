<?php get_header(); ?>
<main class="page blog">
    <div class="container">
        <div class="column three-fourths spacer">
            <div class="column full call-out">
                <div class="breadcrumbs">
                    <p><a href="<?php echo get_site_url(); ?>">Home</a> / <a href="/prism-media-center">Prism Media Center</a> / Documentation</p>
                </div>
                <h2>Halo Prism Latest News</h2>
                <h4>Halo Source Docs</h4>
                <ul class="documents">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>
    <div class="column fourth">
        <?php get_sidebar('solutions'); ?>
    </div>
</div>
</main>
<?php get_footer(); ?>