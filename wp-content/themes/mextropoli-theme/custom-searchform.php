<?php 

$ignored_keys = ['q', 'pag'];

$params = array_filter($_GET, function($key) use ($ignored_keys) {
    return !in_array($key, $ignored_keys);
}, ARRAY_FILTER_USE_KEY);

?>
<form action="<?php echo esc_url( current_url() ); ?>" method="get">
    <?php foreach($params as $name => $value): ?>
        <input type="hidden" name="<?php echo esc_html( $name ); ?>" value="<?php echo esc_html( $value ); ?>">    
    <?php endforeach; ?>
    <input type="search" name="q" placeholder="" value="<?php echo esc_html( get_query_param('q') ); ?>">
    <input type="submit" value="Buscar">
</form>