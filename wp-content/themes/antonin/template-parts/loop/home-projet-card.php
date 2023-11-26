<?php
$args_default = [ 'projet' => false, 'class' => ['projet-card'], 'tag_title' => 'h3'];
$args = wp_parse_args($args, $args_default);
if($args['projet']):
    $fields = get_fields($args['projet']);
    $projetWip = ($fields['a_venir']) ? 'a_venir' : '';
    $index = array_search('cursor-hover',$args['class']);
    if($fields['a_venir'] && $index !== FALSE){
        unset($args['class'][$index]);
    }
    $args['class'][] = $projetWip;
    $tag = ($fields['a_venir']) ? 'div' : 'a';
    $url = ($fields['a_venir']) ? '' : "href=".$fields['url']['url']." ";
    ?>

<<?php echo $tag; ?> <?php echo $url; ?> class="<?php echo implode(' ', $args['class']) ?>">
    <div class="projet-card__thumbnail">
        <?php echo get_the_post_thumbnail($args['projet'],'medium'); ?>
    </div>
    <div class="projet-card__content">
        <div class="projet-card__content-wrap">
                <<?php echo $args['tag_title'] ?> class="projet-card__title"><?php echo get_the_title( $args['projet'] ); ?></<?php echo $args['tag_title'] ?>>
            <div class="projet-card__excerpt"><?php echo get_the_excerpt($args['projet']); ?></div>
        </div>
        <?php if(false === $fields['a_venir']): ?>
            <div class="projet-card__button"></div>
        <?php endif; ?>
    </div>
</<?php echo $tag; ?>>

<?php endif;
