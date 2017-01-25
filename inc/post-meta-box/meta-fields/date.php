<?php 
	wp_enqueue_script( 'jquery-ui-datepicker' ); 
	wp_enqueue_style( 'jquery-ui' );
?>

<input type="text" name="<?php echo $id?>" id="<?php echo $id?>" value="<?php echo $value?>" class="datepicker" />

<script type="text/javascript">
jQuery( document ).ready( function() {
	jQuery( '.datepicker' ).datepicker ( {
		dateFormat : 'dd-mm-yy'
	});
});
</script>