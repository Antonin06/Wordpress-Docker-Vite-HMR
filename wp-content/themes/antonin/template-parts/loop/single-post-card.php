<?php
$title_tag = 'h2';
$categories = wp_get_post_categories(get_the_id());
?>
<div class="single-post-card ax-animation">
	<div class="thumbnail">
		<?php echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'medium'); ?>
	</div>
	<?php if($categories): ?>
		<ul class="categories">
			<?php foreach ($categories as $category): ?>
				<li>
					<a href="<?php echo get_category_link($category);?>"><?php echo get_cat_name($category); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<span class="date"><?php echo get_the_date(); ?></span>

	<a href="<?php the_permalink(get_the_ID()); ?>" class="post-title">
		<<?php echo $title_tag; ?>><?php echo get_the_title(get_the_ID()); ?></<?php echo $title_tag ?>>
	</a>
	<div class="desc">
		<?php echo get_the_excerpt(); ?>
	</div>
	<span class="read-more" data-txt="<?php echo __('Lire plus', 'antonin23'); ?>"></span>
</div>