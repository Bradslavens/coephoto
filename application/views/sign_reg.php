<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	
<div class="container">
	<div class="row">

		<div class="col-xs-12 col-md-6" id="sign_in">

			<?php if(isset($response)) echo $response;  ?> <br>

			Sign In:

			<?php echo validation_errors(); ?>

			<?php echo form_open('/photo/sign_in'); //<form> 	?>

			<form>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div>
		
		<div class="col-xs-12 col-md-6" id="register">
			Don't have an Account? Register Here:

			<?php echo validation_errors(); ?>

			<?php echo form_open('photo/reg_form'); //<form> 	?>

			  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="first_name" placeholder="first name">
			  </div>
			  <div class="form-group">
			    <label for="mi">MI</label>
			    <input type="text" class="form-control" id="mi" placeholder="mi">
			  </div>
			  <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="last_name" placeholder="Last Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>

			  Billing: <br>
			  Do you get paid from your broker or straight from escrow?
			  <div class="radio">
				  <label>
				    <input type="radio" name="billing" id="optionsRadios1" value="1" checked>
				    Escrow
				  </label>
			  </div>
			  <div class="radio">
				  <label>
				    <input type="radio" name="billing" id="optionsRadios2" value="2">
				    My Broker
				  </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="mail_list" value="1"> Send Me Weekley Specials and News
			    </label>
			  </div>

			  <input type="hidden" name="source" value="<?php $source; ?>">


 			  <div class="g-recaptcha" data-sitekey="6Lf4sxUTAAAAAOrUfluOStkbwuxuJWCDlmFWXp-5"></div>

			  <button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div>
	</div>
</div>