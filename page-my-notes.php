<?php get_header();	?>

<div class="container container--narrow">
<form action="#" id="new-note-form">
    <h2 class="headline">Create New Note</h2>

    <input type="text" class="input" id="new-note-title" placeholder="Title">

    <textarea class="input input--textarea" id="new-note-body" placeholder="Your note here..."></textarea>

    <button class="btn">Create Note</button>
</form>
</div>

<?php get_footer(); ?>