<# if ( data.depth == 0 ) { #>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Mega Menu', 'nova-addons' ) ?>" data-panel="mega"><?php esc_html_e( 'Mega Menu', 'nova-addons' ) ?></a>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Mega Menu Design', 'nova-addons' ) ?>" data-panel="design"><?php esc_html_e( 'Design', 'nova-addons' ) ?></a>
<div class="separator"></div>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Menu Icon', 'nova-addons' ) ?>" data-panel="icon"><?php esc_html_e( 'Icon', 'nova-addons' ) ?></a>
<# } else if ( data.depth == 1 ) { #>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Menu Setting', 'nova-addons' ) ?>" data-panel="settings"><?php esc_html_e( 'Settings', 'nova-addons' ) ?></a>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Mega Column Design', 'nova-addons' ) ?>" data-panel="design"><?php esc_html_e( 'Design', 'nova-addons' ) ?></a>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Menu Content', 'nova-addons' ) ?>" data-panel="content"><?php esc_html_e( 'Content', 'nova-addons' ) ?></a>
<div class="separator"></div>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Menu Icon', 'nova-addons' ) ?>" data-panel="icon"><?php esc_html_e( 'Icon', 'nova-addons' ) ?></a>
<# } else { #>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Menu Content', 'nova-addons' ) ?>" data-panel="content"><?php esc_html_e( 'Content', 'nova-addons' ) ?></a>
<div class="separator"></div>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Menu Icon', 'nova-addons' ) ?>" data-panel="icon"><?php esc_html_e( 'Icon', 'nova-addons' ) ?></a>
<# } #>
