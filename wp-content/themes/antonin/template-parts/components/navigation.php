<?php
if(function_exists('wp_pagenavi')) :
	global $wp_query;
	$pages = $wp_query->max_num_pages;
	if (intval($pages)>1) : ?>
        <div id="pagination">
            <?php wp_pagenavi(); ?>
        </div>
    <?php endif;
endif;
