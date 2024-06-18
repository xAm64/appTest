<?php get_header(); ?>

<?php if (have_posts()): ?>
    <dl>
    <?php while(have_posts()): the_post()?>
    <dt><h3><?php the_title() ?></h3></dt>
    <dd><span class="text-secondary"><?php the_author() ?></span><?php the_content() ?></dd>
    <?php endwhile ?>
    </dl>
<?php else: ?>
    <p class="danger">Aucun article trouvé</p>
<?php endif; ?>

<?php get_footer(); ?>