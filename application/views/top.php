<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="top">
	<div class="row">
		<div class="col-md-12">
			<img class="pull-left hidden-xs" src="/assets/logo_color_no_text.gif">
			<!-- <img class="pull-left" src="/assets/man_camera.jpg" height="117" width="78"> -->
			<span class="pull-right" id="sign_reg_phone">

				
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sign_in_form" aria-expanded="false" aria-controls="sign_in_form">Sign In</button>  | <a href="http://photo.srsample.us/#register">Register</a>  
				
				<div id="sign_in_form" class="collapse">
					<?php echo validation_errors(); ?>

					<?php echo form_open('http://photo.srsample.us/sign_in'); //<form> 	?>
					<label>Email:</label> <br>
					<input type="email" name="email" placeholder="Enter Email"><br />
					<label>Password:</label> <br>
					<input type="password" name="password" > <br>

					<input type="submit" value="login">
					</form>

				</div>
				<br />Call: 1-619-253-0529</span>
		</div>
	</div>

</div>
