<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=hello world, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo get_home_url() ?>"><?php bloginfo("name")?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu([
                "theme_location" => "header",
                "container" => false,
                "menu_class" => "navbar-nav me-auto"
            ]) ?>
            <?php get_search_form() ?>
        </div>
    </nav>