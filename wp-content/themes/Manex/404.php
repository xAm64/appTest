<?php get_header(); ?>

<div class="container">
    <div class="text-center">
        <h1 class="text-danger">Erreur 404</h1>
        <p>La page demandé n'a pas été trouvé</p>
        <a class="btn btn-primary" href="<?php echo get_home_url() ?>">Retour à l'accueil<br>
            <img src="<?php echo get_template_directory_uri() ?>/src/img/goodenough.jpg" alt="David Goodenough"></a>
    </div>
</div>

<?php get_footer(); ?>