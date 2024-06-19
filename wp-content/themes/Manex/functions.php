<?php
function manex_MiseEnPage()
{
    //affiche le titre
    add_theme_support("title-tag");
    //support des images en avant des articles
    add_theme_support("post-thumbnails");
    //support des menus
    add_theme_support("menus");
    register_nav_menu("header", "Menu principal");
}

//charger bootstrap
function manex_Register_assets()
{
    wp_register_style("Minty", "https://bootswatch.com/5/minty/bootstrap.css");
    wp_register_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js", [], false, true);
    wp_register_script("Popper", "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js", [], false, true);
    wp_enqueue_style("Minty");
    wp_enqueue_script("bootstrap");
    wp_enqueue_script("popper");
}

//menu bootstrap
function manex_MenuClass($classes)
{
    $classes[] = "nav-item";
    return $classes;
}
function manex_linkClass($attrs)
{
    $attrs["class"] = "nav-link";
    return $attrs;
}
function manex_pagination()
{
    echo '<nav aria-label="Pagination">';
    echo '<ul class="pagination">';
    $pages = paginate_links(["type" => "array"]);
    if ($pages !== null) {
        foreach ($pages as $p) {
            $active = strpos($p, "current") !== false;
            $class = "page-item";
            if ($active) {
                $class = "active";
            }
            echo '<li class="' . $class . '">';
            echo str_replace("page-numbers", "page-link", $p);
            echo '</li>';
        }
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
        echo '<li class="active"><a class="page-link" href="#">1</a></li>';
        echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
    }
    echo "</ul>";
    echo "</nav>";
}

add_action("after_setup_theme", "manex_MiseEnPage");
add_action("wp_enqueue_scripts", "manex_Register_assets");
add_filter("nav_menu_css_class", "manex_MenuClass");
add_filter("nav_menu_link_attributes", "manex_linkClass");
