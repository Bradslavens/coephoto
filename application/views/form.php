<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container" id="form">
	<p>Please complete the following form to request an appointment:</p>
	<form class="form-horizontal">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
	    <div class="col-sm-10">
	      <input type="text" name="first_name" class="form-control" id="inputEmail3" placeholder="First Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
	    <div class="col-sm-10">
	      <input type="text" name = "last_name" class="form-control" id="inputEmail3" placeholder="Last Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
	    <div class="col-sm-10">
	      <input type="text" name = "phone" class="form-control" id="inputEmail3" placeholder="Phone">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input name="mail_list" type="checkbox"  checked> Please send me Special Offers and Updates.
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Request Appointment</button>
	    </div>
	  </div>
	</form>

</div>