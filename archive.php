<?php get_header(); ?>
<main class="page blog">
    <div class="container">
        <div class="column two-thirds spacer">
            <div class="column full call-out">
                <div class="breadcrumbs">
                    <p><a href="<?php echo get_site_url(); ?>">Home</a> / Blog</p>
                </div>
                <h2>Halo Blog</h2>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="post">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><date>Posted on: <?php the_date(); ?></date></p>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
    <div class="column third">
        <?php get_sidebar('solutions'); ?>
    </div>
</div>
</main>
<?php get_footer(); ?>