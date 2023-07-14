<?php
/**
 * Template part for displaying page header
 */
?>
<div class="nova-page-header">
	<div class="row">
		<div class="small-12">
		<div class="nova-page-header__inner">
					<?php
					if( is_realy_woocommerce_page() && ( NOVA_WOOCOMMERCE_IS_ACTIVE ) ) {
						printf( '<h1 class="page-title woocommerce-page-title">%s</h1>', woocommerce_page_title('', false) );
					} else {
						if ( ! is_singular() && !is_home() ) {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
						} else {
							printf( '<h1 class="page-title">%s</h1>', single_post_title( '', false ) );
						}
					}
					nova_site_breadcrumb();
					?>
				</div>
			</div>
	</div>
</div>
