<input type="text" name="<?php echo $id?>" id="upload_image" value="<?php echo $value?>" />
<input type="button" id="upload_image_button" class="button" value="Upload Image" />
<div class="screenshot"><?php if( !empty($value) ): ?><img width="175" src="<?php echo $value?>"><a class="remove-image">Remove</a><?php endif; ?></div>