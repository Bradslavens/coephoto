<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container" id="register">
	<div class="row">
		<div class="col-md-8">
			<h2 class="tag_text">To get started Register Here.</h2>
			<p>You'll also receive weekly discounts and specials via email.</p>

		 	<span class="errors" ><?php echo validation_errors(); ?></span>	

			<form action="reg_form" method="POST">
			<!-- <form action="reg_form" id="registration"> -->

			  <div class="form-group">
			    <label for="first_name">First Name *</label>
			    <input value="<?php echo set_value('first_name'); ?>"  type="text" class="form-control" name="first_name" placeholder="first name">
			  </div>
				
			  <div class="form-group">
			    <label for="last_name">Last Name *</label>
			    <input value="<?php echo set_value('last_name'); ?>"  type="text" class="form-control" name="last_name" placeholder="last name">
			  </div>

				
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email *</label>
			    <input value="<?php echo set_value('email'); ?>"  type="email" class="form-control" name="email" placeholder="email" required>
			  </div>
				
			  <div class="form-group">
			    <label for="phone">Phone</label>
			    <input value="<?php echo set_value('phone'); ?>"  type="tel" class="form-control" name="phone" placeholder="phone" required>
			  </div>
					
			  <div class="form-group">
			    <label for="password">Create Password *</label>
			    <input type="password" class="form-control" name="password" required>
			  </div>


			  <div class="checkbox">
			    <label>
			      <input value="<?php echo set_value('mail_list'); ?>"  name="mail_list" name="mail_list" type="checkbox"> Email me weekly specials!
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input data-toggle="collapse" data-target="#property_dets" aria-expanded="false" aria-controls="property_dets" name="property" type="checkbox"> I need to order a photo shoot now!
			    </label>
			  </div>

			  <div id= "property_dets" class="collapse" > <!-- display if client wants to order a shoot -->

			  <p>Enter the address for your order. The fee is just <span class= "offer_1">299 and you only pay if and when it closes!</span></p>
			  
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

			  <div class="form-group">
			    <input type="hidden" class="form-control" name="source" value="ecamp">
			  </div>



			  </div> <!-- property_dets -->


 			  <div class="g-recaptcha form-group" data-sitekey="6Lf4sxUTAAAAAOrUfluOStkbwuxuJWCDlmFWXp-5"></div>
			

 			  <button type="submit" class="btn btn-default">Submit</button>
			
			</form>



		</div>
		<div class="col-4-md">
			<img class="hidden-xs" src="/assets/logo_white_no_text.gif">
		</div>
	</div>
</div>
