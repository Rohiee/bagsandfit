<?php
/**
 * Image Comparison template
 */

$classes_list[] = 'novaworks-image-comparison';
$classes = implode( ' ', $classes_list );
?>

<div class="<?php echo $classes; ?>">
	<?php $this->__get_global_looped_template( 'image-comparison', 'item_list' ); ?>
</div>
