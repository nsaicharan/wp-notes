<?php 

comment_form( array(
    'title_reply' => 'Write a response',
    'title_reply_before' => '<h3 class="headline headline--sm">',
    'title_reply_after' => '</h3>',

    'comment_notes_before' => '',

    'comment_field' => 
        '<div>
            <label for="comment" class="label">Comment</label>
            <textarea id="comment" class="textarea" name="comment" aria-required="true"></textarea>
        </div>',

    'fields' =>  array(
        'author' =>
            '<div>
                <label for="author" class="label">Name</label>
                <input id="author" class="input" name="author" type="text" value=""> 
            </div>',

        'email' =>
            '<div>
                <label for="email" class="label">Email</label>
                <input id="email" class="input" name="email" type="text" value="">
            </div>'
    ),

    'class_submit' => 'btn'
));


if ( have_comments() ) : 

?>
    
    <h3>Discussion</h3>
   
    <ul>
        <?php
            wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 45,
            ) );
        ?>
    </ul>

<?php endif; //have_comments(); ?>

