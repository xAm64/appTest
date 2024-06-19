<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
            <h1><?php the_title()?></h1>
            <?php the_content() ?>
            <a class="btn btn-primary" href="<?php echo get_post_type_archive_link("post")?>">Voir les dernières actualités</a>
        <?php endwhile ?>
    <?php else : ?>
        <p class="danger">Aucun contenu trouvé</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>