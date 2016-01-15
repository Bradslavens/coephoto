<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="register">
	<div class="row">
		<div class="col-md-8">
			<h2 class="tag_text">Register Here.</h2>
			<p>You'll also receive weekly discounts and specials via email.</p>

			<!-- my form -->
			<!-- <form class="form">
			  <div class="form-group">
			    <label for="Name">First Name</label>
			    <input type="text" class="form-control" id="first_name" placeholder="Enter First Name">
			  </div>
			  <div class="form-group">
			    <label for="Name">Last Name</label>
			    <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" placeholder="email">
			  </div>
			  <button type="submit" class="btn btn-default">Register</button>
			</form> -->

			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
			<form action="//slavensrealty.us12.list-manage.com/subscribe/post?u=fe5c8ce76eb8cb317a69e4f7e&amp;id=045852ca5c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			    <div id="mc_embed_signup_scroll">
			<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
			<div class="mc-field-group">
				<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
			</label>
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
			</div>
			<div class="mc-field-group">
				<label for="mce-FNAME">First Name </label>
				<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
			</div>
			<div class="mc-field-group">
				<label for="mce-LNAME">Last Name </label>
				<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
			</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_fe5c8ce76eb8cb317a69e4f7e_045852ca5c" tabindex="-1" value=""></div>
			    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
			    </div>
			</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!--End mc_embed_signup-->
		</div>
		<div class="col-4-md">
			<img src="/assets/logo_white_no_text.gif">
		</div>
	</div>
</div>
