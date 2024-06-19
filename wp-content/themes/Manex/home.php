<?php get_header(); ?>

<div class="container">
    <h1><?php echo get_the_title() ?></h1>
    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post() ?>
                <div class="col-4">
                    <div class="container">
                        <h5 class="text-primary"><?php the_title() ?></h5>
                        <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:90%; height:auto">
                        <p><?php $article_data = substr(get_the_content(), 0, 250);
                            echo $article_data ?></p>
                        <a href="<?php the_permalink() ?>" class="btn btn-primary">Consulter</a>
                    </div>
                </div>
            <?php endwhile ?>
            <?php manex_pagination() ?>
        <?php else : ?>
            <p class="danger">Aucun article trouvé</p>
        <?php endif; ?>
        </div>
</div>

<?php get_footer(); ?>