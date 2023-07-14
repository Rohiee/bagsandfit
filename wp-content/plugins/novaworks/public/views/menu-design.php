<# var itemId = data.data['menu-item-db-id']; #>
<div id="novamm-panel-design" class="novamm-panel-design novamm-panel">
	<# if ( 1 == data.depth ) { #>
	<div class="setting-fieldset spacing-fieldset">
		<p class="padding-fields">
			<label><?php esc_html_e( 'Padding', 'nova-addons' ) ?></label><br>
			<label>
				<input type="text" value="{{ data.megaData.padding.top }}" name="{{ novamm.getFieldName( 'padding.top', itemId ) }}" size="4" placeholder="30px"><br>
				<span class="description"><?php esc_html_e( 'Top', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.padding.bottom }}" name="{{ novamm.getFieldName( 'padding.bottom', itemId ) }}" size="4" placeholder="20px"><br>
				<span class="description"><?php esc_html_e( 'Bottom', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.padding.left }}" name="{{ novamm.getFieldName( 'padding.left', itemId ) }}" size="4" placeholder="23px"><br>
				<span class="description"><?php esc_html_e( 'Left', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.padding.right }}" name="{{ novamm.getFieldName( 'padding.right', itemId ) }}" size="4" placeholder="20px"><br>
				<span class="description"><?php esc_html_e( 'Right', 'nova-addons' ) ?></span>
			</label>
		</p>

		<p class="margin-fields">
			<label><?php esc_html_e( 'Margin', 'nova-addons' ) ?></label><br>
			<label>
				<input type="text" value="{{ data.megaData.margin.top }}" name="{{ novamm.getFieldName( 'margin.top', itemId ) }}" size="4"><br>
				<span class="description"><?php esc_html_e( 'Top', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.margin.bottom }}" name="{{ novamm.getFieldName( 'margin.bottom', itemId ) }}" size="4"><br>
				<span class="description"><?php esc_html_e( 'Bottom', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.margin.left }}" name="{{ novamm.getFieldName( 'margin.left', itemId ) }}" size="4"><br>
				<span class="description"><?php esc_html_e( 'Left', 'nova-addons' ) ?></span>
			</label>
			&nbsp;
			<label>
				<input type="text" value="{{ data.megaData.margin.right }}" name="{{ novamm.getFieldName( 'margin.right', itemId ) }}" size="4"><br>
				<span class="description"><?php esc_html_e( 'Right', 'nova-addons' ) ?></span>
			</label>
		</p>
	</div>
	<# } #>

	<div class="setting-fieldset background-fieldset background-image-fieldset">
		<p class="background-image">
			<label><?php esc_html_e( 'Background Image', 'nova-addons' ) ?></label><br>
			<span class="background-image-preview {{ data.megaData.background.image ? 'has-image' : '' }}">
				<# if ( data.megaData.background.image ) { #>
					<img src="{{ data.megaData.background.image }}">
				<# } #>
			</span>

			<button type="button" class="button remove-button <# if ( ! data.megaData.background.image ) { print( 'hidden' ) } #>"><?php esc_html_e( 'Remove', 'nova-addons' ) ?></button>
			<button type="button" class="button upload-button" id="background_image-button"><?php esc_html_e( 'Select Image', 'nova-addons' ) ?></button>

			<input type="hidden" name="{{ novamm.getFieldName( 'background.image', itemId ) }}" value="{{ data.megaData.background.image }}">
		</p>
	</div>

	<div class="setting-fieldset background-fieldset">
		<p class="background-color">
			<label><?php esc_html_e( 'Background Color', 'nova-addons' ) ?></label><br>
			<input type="text" class="background-color-picker" name="{{ novamm.getFieldName( 'background.color', itemId ) }}" value="{{ data.megaData.background.color }}">
		</p>

		<p class="background-repeat">
			<label><?php esc_html_e( 'Background Repeat', 'nova-addons' ) ?></label><br>
			<select name="{{ novamm.getFieldName( 'background.repeat', itemId ) }}">
				<option value="no-repeat" {{ 'no-repeat' == data.megaData.background.repeat ? 'selected="selected"' : '' }}><?php esc_html_e( 'No Repeat', 'nova-addons' ) ?></option>
				<option value="repeat" {{ 'repeat' == data.megaData.background.repeat ? 'selected="selected"' : '' }}><?php esc_html_e( 'Tile', 'nova-addons' ) ?></option>
				<option value="repeat-x" {{ 'repeat-x' == data.megaData.background.repeat ? 'selected="selected"' : '' }}><?php esc_html_e( 'Tile Horizontally', 'nova-addons' ) ?></option>
				<option value="repeat-y" {{ 'repeat-y' == data.megaData.background.repeat ? 'selected="selected"' : '' }}><?php esc_html_e( 'Tile Vertically', 'nova-addons' ) ?></option>
			</select>
		</p>

		<p class="background-position background-position-x">
			<label><?php esc_html_e( 'Background Position', 'nova-addons' ) ?></label><br>

			<select name="{{ novamm.getFieldName( 'background.position.x', itemId ) }}">
				<option value="left" {{ 'left' == data.megaData.background.position.x ? 'selected="selected"' : '' }}><?php esc_html_e( 'Left', 'nova-addons' ) ?></option>
				<option value="center" {{ 'center' == data.megaData.background.position.x ? 'selected="selected"' : '' }}><?php esc_html_e( 'Center', 'nova-addons' ) ?></option>
				<option value="right" {{ 'right' == data.megaData.background.position.x ? 'selected="selected"' : '' }}><?php esc_html_e( 'Right', 'nova-addons' ) ?></option>
				<option value="custom" {{ 'custom' == data.megaData.background.position.x ? 'selected="selected"' : '' }}><?php esc_html_e( 'Custom', 'nova-addons' ) ?></option>
			</select>

			<input
				type="text"
				name="{{ novamm.getFieldName( 'background.position.custom.x', itemId ) }}"
				value="{{ data.megaData.background.position.custom.x }}"
				class="{{ 'custom' != data.megaData.background.position.x ? 'hidden' : '' }}">
		</p>

		<p class="background-position background-position-y">
			<select name="{{ novamm.getFieldName( 'background.position.y', itemId ) }}">
				<option value="top" {{ 'top' == data.megaData.background.position.y ? 'selected="selected"' : '' }}><?php esc_html_e( 'Top', 'nova-addons' ) ?></option>
				<option value="center" {{ 'center' == data.megaData.background.position.y ? 'selected="selected"' : '' }}><?php esc_html_e( 'Middle', 'nova-addons' ) ?></option>
				<option value="bottom" {{ 'bottom' == data.megaData.background.position.y ? 'selected="selected"' : '' }}><?php esc_html_e( 'Bottom', 'nova-addons' ) ?></option>
				<option value="custom" {{ 'custom' == data.megaData.background.position.y ? 'selected="selected"' : '' }}><?php esc_html_e( 'Custom', 'nova-addons' ) ?></option>
			</select>
			<input
				type="text"
				name="{{ novamm.getFieldName( 'background.position.custom.y', itemId ) }}"
				value="{{ data.megaData.background.position.custom.y }}"
				class="{{ 'custom' != data.megaData.background.position.y ? 'hidden' : '' }}">
		</p>

		<p class="background-attachment">
			<label><?php esc_html_e( 'Background Attachment', 'nova-addons' ) ?></label><br>
			<select name="{{ novamm.getFieldName( 'background.attachment', itemId ) }}">
				<option value="scroll" {{ 'scroll' == data.megaData.background.attachment ? 'selected="selected"' : '' }}><?php esc_html_e( 'Scroll', 'nova-addons' ) ?></option>
				<option value="fixed" {{ 'fixed' == data.megaData.background.attachment ? 'selected="selected"' : '' }}><?php esc_html_e( 'Fixed', 'nova-addons' ) ?></option>
			</select>
		</p>

		<p class="background-size">
			<label><?php esc_html_e( 'Background Size', 'nova-addons' ) ?></label><br>
			<select name="{{ novamm.getFieldName( 'background.size', itemId ) }}">
				<option value=""><?php esc_html_e( 'Default', 'nova-addons' ) ?></option>
				<option value="cover" {{ 'cover' == data.megaData.background.size ? 'selected="selected"' : '' }}><?php esc_html_e( 'Cover', 'nova-addons' ) ?></option>
				<option value="contain" {{ 'contain' == data.megaData.background.size ? 'selected="selected"' : '' }}><?php esc_html_e( 'Contain', 'nova-addons' ) ?></option>
			</select>
		</p>
	</div>
</div>