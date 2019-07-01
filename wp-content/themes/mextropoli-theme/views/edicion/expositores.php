<?php
    
    $terms = get_terms([
    	'taxonomy' => 'edition-speaker',
    	'hide_empty' => false
	]);

?>

<!-- E x p o s i t o r e s -->
<div class="expositores">
    <div class="expositores__contenedor">
        <div class="flex-center">
            <h2 class="expositores__titulo">Expositores</h2>
        </div>
        
        <ul>
            <?php //foreach($terms as $term): ?>
                <li>
                    <?php // print $term ?>
                </li>
            <?php //endforeach; ?>
        </ul>

        
    </div>
</div>