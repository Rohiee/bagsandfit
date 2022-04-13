<?php
/**
 * Features list item template
 */
 $item_title_attr = $this->get_item_attributes( 'item_title', 'panels_list', $this->__processed_item_index, 'timeline-item__card-title' );
?>
<li>
  <a data-toggle="description" aria-expanded="false" aria-controls="description" <?php echo $item_title_attr ?>>
    <?php echo $this->get_loop_item_icon(); ?>
    <?php sprintf( '<span class="panels-list__item-title">%1$s</span>', $item['item_title'] );?>
  </a>
</li>
