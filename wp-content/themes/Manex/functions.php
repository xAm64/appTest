<?php
function manex_MiseEnPage(){
    //affiche le titre
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
}

//charger bootstrap
function manex_Register_assets() {
    wp_register_style("Minty", "https://bootswatch.com/5/minty/bootstrap.css");
    wp_register_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js", [], false, true);
    wp_register_script("Popper", "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js", [], false, true);
    wp_enqueue_style("Minty");
    wp_enqueue_script("bootstrap");
    wp_enqueue_script("popper");
}
add_action("after_setup_theme", "manex_MiseEnPage");
add_action("wp_enqueue_scripts", "manex_Register_assets");
?>