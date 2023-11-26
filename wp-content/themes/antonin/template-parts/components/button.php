<?php

$args_default = [ 'link' => '', 'text' => '', 'class' => ['btn']];
$args = wp_parse_args($args, $args_default);

if($args['link']): ?>

<a href="<?php echo get_permalink($args['link']); ?>" class="<?php echo implode(' ', $args['class']) ?>">
	<p><?php echo $args['text']; ?></p>
	<?php if(in_array('btn-circle',$args['class'])): ?>
	<span class="circle"></span>
	<?php endif; ?>
</a>

<?php endif;