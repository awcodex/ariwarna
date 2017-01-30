<?php
/*
Template Name: Kontact Template
*/
?>

<?php //get_template_part('templates/page', 'header'); ?>
<?php //get_template_part('templates/content', 'page'); ?>
<div> 
	<div class="main-content custom-contact">
		<br />
		<p>Aw<span class="text-blue">Codex</span> | Ari<span class="text-blue">Warna</span></p>
		<p>Amirono Street, Gg Kemboja, Rt 04/01, Slote</p>
		<p>Serangan, Sukorejo, Ponorogo, 63453</p>
		<p>Indonesia</p>
		<hr />
		<p>Phone	<span class="text-blue">+6285708060008</span></p>
		<p>Email 	<span class="text-blue">info@ariwarna.net</span></p>
		<hr />
		<div id="node"></div>
		<div id="success"></div>
		<form method="POST" id="form_contact" class="enrollment-page">
			<div class="col-sm-4 form-input"><label>First Name<span class="text-red">*</span></label></div>
			<div class="col-sm-8 form-input" name="nama"><input type="text" name="first_name" id="first_name"></div> 
			<div class="clearfix"></div>
			
			<div class="col-sm-4 form-input"><label>Last Name</</label></div>
			<div class="col-sm-8 form-input"><input type="text" name="last_name" id="last_name"></div>
			<div class="clearfix"></div>
			
			<div class="col-sm-4 form-input"><label>E-mail<span class="text-red">*</span></</label></div>
			<div class="col-sm-8 form-input" name="email"><input type="email" name="email" id="email"></div>
			<div class="clearfix"></div>
			
			<div class="col-sm-4 form-input"><label>Phone</</label></div>
			<div class="col-sm-8 form-input"><input type="text" name="phone" id="phone"></div>
			<div class="clearfix"></div>
			
			<div class="col-sm-4 form-input"><label>Your Message<span class="text-red">*</span></label></div>
			<div class="col-sm-8 form-input"><textarea class="umessage" name="message" id="message"></textarea></div>
			<div class="clearfix"></div>
			
			<div class="col-sm-4 form-input"><label> </label></div>
			<div class="col-sm-8 form-input">
				<input type="submit" class="btn-success btn" id="btn_contact" name="btn_contact" value="Submit">
					<input type="hidden" name="action" value="form">
					<input type="hidden" name="status" value="contact">
					<input type="hidden" name="verify" value="<?php echo wp_create_nonce( 'contact' ); ?>">
			</div>
		</form> 
		<p></p>
		<p class="text-right"><small><i><span class="text-red">*</span> Important Field</i></small></p>
	</div>
</div>