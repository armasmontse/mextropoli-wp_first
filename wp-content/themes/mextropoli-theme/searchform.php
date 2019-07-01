<form role="search" method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <input type="search"  class="" placeholder="<?php echo __('Buscar', TRANSDOMAIN); ?>" value="<?php echo get_search_query(); ?>" name="s">
</form>