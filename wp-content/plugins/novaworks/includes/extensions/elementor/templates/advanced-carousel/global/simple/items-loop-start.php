<?php
/**
 * Loop start template
 */
$options = $this->get_advanced_carousel_options();
$dir = is_rtl() ? 'rtl' : 'ltr';

?>
<div class="novaworks-carousel slick-carousel js-el" data-slider_config="<?php echo htmlspecialchars( json_encode( $options ) ); ?>" dir="<?php echo $dir; ?>" data-nova_component="AutoCarousel">
