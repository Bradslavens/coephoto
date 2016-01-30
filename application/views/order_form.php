<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
input {
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	color: black;
	border: 1px;
}
</style>

<div class="container" id="register">
	<div class="row">
		<div class="col-md-8">
			<h2 class="tag_text">Welcome Back <?php echo $contact['first_name']; ?></h2>
			Please Complete the order form and one of our photographers will give you a call.
			<div class="errors">
				<?php echo validation_errors(); ?>
			</div>

			<?php echo form_open('order'); //<form> 	?>

			<!-- <form action="reg_form" id="registration"> -->

			  <div id= "property_dets" > <!-- display if client wants to order a shoot -->

			  <p>Enter the address for your order. The fee is just <span class= "offer_1">$299 and you only pay if and when it closes! (<noframes></noframes> credit card required. No upfront fees.)</span></p>
			  
			  <div class="form-group">
			    <label for="Address">Address 1</label>
			    <input value="<?php echo set_value('address_1'); ?>"  type="address" class="form-control" name="address_1" placeholder="Address">
			  </div>

			  <div class="form-group">
			    <label for="Address">Address 2</label>
			    <input value="<?php echo set_value('address_2'); ?>"  type="address" class="form-control" name="address_2" placeholder="Address">
			  </div>

			  <div class="form-group">
			    <label for="city">City</label>
			    <input value="<?php echo set_value('city'); ?>"  type="text" class="form-control" name="city" placeholder="City">
			  </div>

				
			  <div class="form-group">
			    <label for="state">State</label>
			    <input value="<?php echo set_value('state'); ?>"  type="text" class="form-control" name="state" placeholder="State">
			  </div>

				
			  <div class="form-group">
			    <label for="zip">Zip</label>
			    <input value="<?php echo set_value('zip'); ?>"  type="text" class="form-control" name="zip" placeholder="Zip">
			  </div>

			  <div class="form-group">
			    <input type="hidden" class="form-control" name="package1" value="1">
			  </div>

			  <div class="form-group">
			    <input type="hidden" class="form-control" name="fee" value="299">
			  </div>

			  </div> <!-- property_dets -->

			  <input type="hidden" name= "user_id" value="<?php echo $contact['user_id']; ?>">

 			  <div class="g-recaptcha" data-sitekey="6Lf4sxUTAAAAAOrUfluOStkbwuxuJWCDlmFWXp-5"></div>
 			  
 			  <button type="submit" class="btn btn-default">Submit</button>


			</form>



		</div>
		<div class="col-4-md">
			<img src="/assets/logo_white_no_text.gif">
		</div>
	</div>
</div>
