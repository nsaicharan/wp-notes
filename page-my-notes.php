<?php get_header();	?>

<div class="container container--narrow">
    <form action="#" class="bg-secondary" id="new-note-form">
        <h2 class="headline">Create New Note</h2>

        <input type="text" class="input" id="new-note-title" placeholder="Title">

        <textarea class="textarea" id="new-note-body" placeholder="Your note here..."></textarea>

        <button class="btn">Create Note</button>
    </form>

    <br><br>
    <hr>
    <br><br>

    <h3 class="headline headline--sm t-center">Previous Notes</h3>

    <ul class="notes-list">
        <?php 
            $notesQuery = new WP_Query( array(
                'post_type' => 'note',
                'posts_per_page' => -1,
                'author' => get_current_user_id()
            ) );

            while( $notesQuery->have_posts() ) : $notesQuery->the_post(); 
        ?>

        <li class="note" data-note-id="<?php echo the_ID() ?>">
            <a href="<?php the_permalink(); ?>" class="note__title">
                <?php echo get_the_title(); ?>
            </a>

            <div class="note__options">
                <a href="#" class="js-delete-note btn btn--icon btn--danger mr-sm" title="Delete">X</a>
                <a href="#" class="js-edit-note btn btn--icon btn--secondary" title="Edit">E</a>
            </div>

            <p class="note__content"><?php echo get_the_content(); ?></p>
        </li>

        <?php endwhile; ?>
    </ul>

</div>

<?php get_footer(); ?>