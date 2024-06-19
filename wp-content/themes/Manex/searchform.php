<form class="d-flex" action="<?php esc_url(home_url("/")) ?>">
    <input class="form-control me-sm-2" name="s" type="search" placeholder="Rechercher" value="<?php get_search_query() ?>">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
</form>