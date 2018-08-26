<?php get_header(); ?>

<?php  while (have_posts()) : the_post(); ?>
    <div class="container container--narrow">
        <article class="post">
            <h2 class="post__title"><?php the_title(); ?></h2>

            <div class="post__meta">
                Written by <a href="<?php echo get_author_posts_url( get_the_author_ID() ); ?>"><?php the_author(); ?></a> on <?php the_time( 'M d, Y' ) ?>
            </div>
        
            <div class="post__content">
                <?php the_content(); ?>
            </div>
        </article>

        <hr class="section-break">

        <div class="comments">
            <?php comments_template(); ?>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>

