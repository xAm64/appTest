<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
            <h2><?php the_title() ?></h2><br>
            <img src="<?php the_post_thumbnail_url()?>" alt="" style="width:auto; height: 400px;"><br>
            <span class="text-secondary"><?php the_author() ?></span>
            <?php the_content() ?>
        <?php endwhile ?>
    <?php else : ?>
        <p class="danger">Aucun article trouvé</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>