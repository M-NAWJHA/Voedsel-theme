<?php
	global $blocks , $sections , $fields , $break , $theme_name , $theme_name_prefix;
	if( get_option('bebeloption') ){
		$get_options = get_option('bebeloption');
		$get_option = $get_options['bebeloption'];
	}
?>


<div class="wrap">
<div id="admin-panel">   

	<div id="admin-panel-content">

		<div id="saved"></div>

		<div class="clear"></div>

		<form method="post" id="kadoo_form">

		<?php foreach ($blocks as $block): ?>

		<div class="block" id="<?php echo $block['id']; ?>">

		<h2 class="block_title"><?php echo $block['name']; ?></h2>

		<div class="block-content">
		
	    <?php foreach ($sections as $section): if ($section['block_id'] == $block['id']): ?>

		<?php 
		switch ( $section['type'] ) :
		case "normal": 
		?>

			<h2 class="section_title"><?php echo $section['name']; ?></h2>
			
			<section id="<?php echo $section['id']; ?>">
			
			<div class="section-content">

				<?php foreach ($fields as $field): if ($field['section_id'] == $section['id']): ?>

					<div class="field_row <?php if (isset($type)) { echo $type; } ?>">

					<?php
						if (!isset($field['note'])) {
							$field['note'] = "";
						}
						if (!isset($field['std'])) {
							$field['std'] = "";
						}
						$id = $field['id'];
						$std = $field['std'];
						$type = 't'.$field['type'];
						$label = $field['label'];
						$name = "bebeloption[".$id."]";
						if ($field['type'] != "note") {
							$value = $get_option[$id];
						}
						//($std == "")? $std = "false" : $std = "true";
						//($value == "")? $value = $std : $value = $get_option[$id];
						$note = $field['note'];
					?>

						
					<?php switch ( $field['type'] ) : case "note": 	?>
						<div class="note"><?php echo $label; ?></div>
					<?php break; ?>
						
					<?php case "text": 	?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<input class="text" type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" />
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>
						
					<?php case "upload": 	?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<input class="text" type="text" style="display:inline-block;" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" />
							<input class="upload_image_button push_button red" style="margin:0;width:100px;display:inline-block;line-height:25px;height:30px;" type="button" value="upload" />
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>

					<?php case "textarea": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<textarea type="text" name="<?php echo $name; ?>" id="<?php echo $id;?>"><?php echo stripslashes($value); ?></textarea>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>

					<?php case "map": $do_js_folder	 =   get_template_directory_uri() . '/includes/panel/js'; ?>
						<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
						<script src="<?php echo $do_js_folder ?>/locationpicker.jquery.js"></script>
						<?php
							$Address = urlencode($value);
							$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
							$xml = simplexml_load_file($request_url) or die("url not loading");
							$status = $xml->status;
							if ($status=="OK") {
								$Lat = $xml->result->geometry->location->lat;
								$Lon = $xml->result->geometry->location->lng;
							}
						?>
						<script type="text/javascript">
							jQuery(document).ready(function($) {
								$('.somecomponent').locationpicker({
									location: {latitude: <?php echo $Lat ?>, longitude: <?php echo $Lon ?>},
									radius: 300,
									inputBinding: {
										// latitudeInput: $('#us3-lat'),
										// longitudeInput: $('#us3-lon'),
										// radiusInput: $('#us3-radius'),
										locationNameInput: $('.map-add')        
									},
									enableAutocomplete: true,
								});
							});
						</script>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="somecomponent" style="width: 100%; height: 300px;"></div><br>
							<input type="text" name="<?php echo $name; ?>" id="<?php echo $id;?>" class="widefat map-add" value="<?php echo $value; ?>">
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>
					
					<?php case "editor": ?>
						<label class="field-title"  for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
						<div class="insideoptions">
						<?php
							$id = $field['id'];
							$con = stripslashes($get_option[$field['id']]);
							
							$settings = array(
								'textarea_name' => 'bebeloption['.$field['id'].']', 
								'editor_class' => $id,
								'media_buttons' => false,
								'textarea_rows' => 6,
								'teeny' => true,
								'wpautop' => false,
								'quicktags' => true,
								'tinymce' => true,
								'editor_css'	=> '<style>.wp-editor-wrap{width:100%;}</style>'
							);
							wp_editor($con, $id, $settings );
						?>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>

					<?php 
					case "select": 
						$options = $field['options'];
						if (isset($field['options_value'])){
							$options_value = $field['options_value'];
						}
					?>

						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
								<?php if (isset($field['options_value'])): ?>
									<?php $i = -1; foreach ($options as $option) { $i++; ?>
									<option value="<?php echo $options_value[$i]; ?>" <?php if ( $value == $options_value[$i]) { echo 'selected="selected"'; } ?>>
										<?php echo $option; ?>
									</option>
									<?php } ?>
								<?php else: ?>
									<?php foreach ($options as $option) { ?>
									<option value="<?php echo $option; ?>" <?php if ( $value == $option) { echo 'selected="selected"'; } ?>>
										<?php echo $option; ?>
									</option>
									<?php } ?>
								<?php endif ?>
							</select>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php 
					case "pageselect": 
						$pages = get_pages();
						$options = $field['options'];
						if (isset($field['options_value'])){
							$options_value = $field['options_value'];
						}
					?>

						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
								<?php foreach ($pages as $page) {
								if ( $value == $page->ID) { $selected = ' selected="selected"'; } else { $selected = ''; }
								$opt = '<option value="' . $page->ID . '"' . $selected . '>' . $page->post_title . '</option>';
								echo $opt; } ?>
							</select>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php 
					case "categoryselect": 
						$categories = get_categories(array('orderby' => 'name','order' => 'ASC','hide_empty ' => 0));
						$options = $field['options'];
						if (isset($field['options_value'])){
							$options_value = $field['options_value'];
						}
					?>

						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
								<?php foreach ($categories as $category) {
								if ( $value == $category->cat_ID) { $selected = ' selected="selected"'; } else { $selected = ''; }
								$opt = '<option value="' . $category->cat_ID . '"' . $selected . '>' . $category->cat_name . '</option>';
								echo $opt; } ?>
							</select>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php 
					case "categorymultiselect": 
						$categories = get_categories(array('orderby' => 'name','order' => 'ASC','hide_empty ' => 0));
						$options = $field['options'];
						if (isset($field['options_value'])){
							$options_value = $field['options_value'];
						}
					?>

						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<select name="<?php echo $name; ?>[]" id="<?php echo $id; ?>" multiple>
								<?php foreach ($categories as $category) {
								if ( in_array($category->cat_ID , $value)) { $selected = ' selected="selected"'; } else { $selected = ''; }
								$opt = '<option value="' . $category->cat_ID . '"' . $selected . '>' . $category->cat_name . '</option>';
								echo $opt; } ?>
							</select>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php 
					case "categorymultiselectmovies": 
						$categories = get_terms('movies_category', 'orderby=name&hide_empty=0');

						$options = $field['options'];
						if (isset($field['options_value'])){
							$options_value = $field['options_value'];
						}
					?>

						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<select name="<?php echo $name; ?>[]" id="<?php echo $id; ?>" multiple>
								<?php foreach ($categories as $category) {
								if ( in_array($category->term_id , $value)) { $selected = ' selected="selected"'; } else { $selected = ''; }
								$opt = '<option value="' . $category->term_id . '"' . $selected . '>' . $category->name . '</option>';
								echo $opt; } ?>
							</select>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case "checkbox_img": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<ul class="checkbox_img">
								<?php foreach ($field['options'] as $key => $option) : ?>
								<?php
									$name = "bebeloption[".$field['id'].']['.$key.']';
									$label = $field['id'].$key;
									$value = $get_option[$field['id']];
									$checked = ( $value[$key] == $option ? 'checked="checked"' :  ""); 
									$class = ( $value[$key] == $option ? 'checkbox_img-selected' :  ""); 
								?>
								<li class="ghghgh  <?php echo $class; ?>">
									<input type="checkbox" value="<?php echo $option; ?>" name="<?php echo $name;?>" id="" <?php echo $checked; ?> >
									<span><?php echo $option; ?></span>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case "radio": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<ul class="radio-list">
								<?php foreach ($field['options'] as $key => $option) : ?>
								<?php $checked = ( $value == $key ? 'checked="checked"' :  ""); ?>
								<?php $checkedc = ( $value == $key ? 'radio-list-selected' :  ""); ?>
								<li class="singleli-img <?php echo $checkedc; ?>">
									<input type="radio" value="<?php echo $key; ?>" name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $checked; ?> >
									<span><?php echo $option; ?></span>
								</li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php
					/*
						pattern Or Skin Select
					*/
					?>
					<?php case "radio-img": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<?php foreach ( $field['options'] as $key => $option ): ?>
							<?php 
							if ( $get_option[$field['id']] == $key ){
								$checked = "checked=\"checked\"";
								$img_slcalss = "radio-img-selected";
							}else{
								$checked = "";
								$img_slcalss = "";
							}
							?>
							<div class="row">
								<input type="radio" <?php echo $checked; ?> id="<?php echo $key; ?>" class="radio-img-radio" value="<?php echo $key; ?>" name="<?php echo $name; ?>" />
								<div class="radio-img-label"><?php echo $key; ?></div>
								<img src="<?php echo $option; ?>" class="radio-img-img <?php echo $img_slcalss; ?>" onclick="document.getElementById('<?php echo $key; ?>').checked=true;" />
							</div>
							<?php endforeach; ?>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $field['note']; ?></div><?php } ?>
					<?php break; ?>

					<?php case "on-off": ?>
						<?php ( $value =="true" ) ? $checkedc = "on-botton": $checkedc = ""; ?>
						<?php if ($value == "") $value = "false"; ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="on-off <?php echo $checkedc; ?>">
								<input  type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"  id="<?php echo $id; ?>"/>
								<span>On-off</span>
							</div>
						</div>
						<div class="clear"></div>			
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case 'slider': ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="uislider">
								<div id="<?php echo $id; ?>-slider"></div>
								<input type="text" id="<?php echo $id; ?>" value="<?php echo $value; ?>" name="<?php echo $name; ?>" style="width:50px;" />
								<?php echo $field['unit']; ?>
							</div>
							<script>
							  jQuery(document).ready(function() {
								jQuery("#<?php echo $field['id']; ?>-slider").slider({
									range: "min",
									min: <?php echo $field['min']; ?>,
									max: <?php echo $field['max']; ?>,
									step: <?php echo $field['step']; ?>,
									value: <?php if( $get_option[$field['id']] ) echo $get_option[$field['id']]; else echo 0; ?>,
									slide: function(event, ui) {
										jQuery('#<?php echo $field['id']; ?>').attr('value', ui.value );
									}
								});
							  });
							</script>
						</div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case "colorpicker": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<?php //$default_color = '' ?>
							<div class="colorpicker">
								<input type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" data-default-color="<?php if (isset($field['default-color'])) { echo $field['default-color']; } ?>" />
							</div>
							<script type="text/javascript">
								jQuery(document).ready(function($){
									//var iddd = "#";
									$("#<?php echo $id; ?>").wpColorPicker();
								});
							</script>
						</div>
						<div class="clear"></div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case "upload": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="upload">
								<input class="regular-text text-upload" type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>"  />
								<input type='button' class='button button-upload' value='<?php _e( 'Upload', 'biz' ); ?>'/>
								<div class="clear"></div>
								<img style='display: block;' src='<?php echo esc_url( $value ); ?>' class='preview-upload'/>
							</div>
						</div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php case "upload-noimage": ?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="upload">
								<input class="regular-text text-uploadf" type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>"  />
								<input type='button' class='button button-uploadf' value='<?php _e( 'Upload', 'biz' ); ?>'/>
							</div>
						</div>
						<?php if (!empty($field['note'])){ ?><div class="note"><?php echo $note; ?></div><?php } ?>
					<?php break; ?>

					<?php
					case "mu-upload":
					$photo_id = $get_option[$id];
					?>
						<label class="field-title"  for="<?php echo $id; ?>"><?php echo $label; ?></label>
						<div class="insideoptions">
							<div class="multiupload" id="<?php echo $id;?>" >
								<?php if($photo_id): $i = 0; ?>
									<?php foreach ($photo_id as $key => $photo) :  $i++; ?>
									<?php if ($i == 1) : ?>
										<div class="upload-r">
											<img src="<?php echo $photo; ?>" width="40px" style="float:right;margin-left:5px;" />
											<input class="regular-text text-upload" type="text" name="bebeloption[<?php echo $id ?>][]" value="<?php echo $photo; ?>"  />
											<input type='button' class='button button-upload' value='<?php _e( 'Upload', 'biz' ); ?>'/>
											<input type='button' class='addnewfield' value='+'/>
										<div class="clear" style="padding:5px 0;"></div>
										</div>
									<?php else: ?>
										<div class="upload-r">
											<img src="<?php echo $photo; ?>" width="40px" style="float:right;margin-left:5px;" />
											<input class="regular-text text-upload" type="text" name="bebeloption[<?php echo $id ?>][]" value="<?php echo $photo; ?>"  />
											<input type='button' class='button button-upload' value='<?php _e( 'Upload', 'biz' ); ?>'/>
											<input type='button' class='addnewfield' value='+'/>
											<input type='button' class='removefield' value='-'/>
										<div class="clear" style="padding:5px 0;"></div>
										</div>
									<?php endif;?>
									<?php endforeach; //foreach ($photo_id as $key => $photo) : ?>
								<?php else: //if there if no photos in $photo array?>
									<div class="upload-r">
										<input class="regular-text text-upload" type="text" name="bebeloption[<?php echo $id ?>][]" value="<?php echo $photo; ?>"  />
										<input type='button' class='button button-upload' value='<?php _e( 'Upload', 'biz' ); ?>'/>
										<input type='button' class='addnewfield' value='+'/>
										<div class="clear"></div>
									</div>
								<?php endif; //if($photo_id): ?>
							</div><!--end of multi upload-->
						</div>
					<?php break; ?>	

					<?php endswitch; //end field type switch ?>
						
					</div><!--end of field_row-->
						
				<?php endif; endforeach; //foreach ($fields as $field): if ($field['section_id'] == $section['id']): ?>

			</div><!--end of section-content-->
			</section><!--end of section-->

		<?php break; //break section normal type ?>

		<?php case "custom": ?>

			<h2 class="section_title"><?php echo $section['name']; ?></h2>
			<section id="<?php echo $section['id']; ?>">
			
			<div class="section-content">

				<?php  $section['func'](); ?>

			</div><!--end of section-content-->
			</section><!--end of section-->

		<?php break; //break section custom type ?>
		<?php endswitch; //end sectipn type switch ?>


		<?php endif; endforeach; //foreach ($sections as $section): if ($section['block_id'] == $block['id']): ?>
		
		</div><!--end of block-content-->
		</div><!--end of block id-->
		<?php endforeach; //foreach ($blocks as $block): ?>

		<div id="savedd"></div>
		<input type="hidden" name="action" value="doanha_save_theme_data_ajax" />
		<input type="hidden" name="security" value="<?php echo wp_create_nonce('doanha_theme_nonce'); ?>" />
		<input name="save" type="submit" value="<?php _e( 'حفظ الإعدادات', 'biz' ); ?>" class="push_button blue" />
		</form>
	</div><!--end admin-panel-content -->
	
</div><!--end of admin-panel-->
</div><!--end of wrap class-->