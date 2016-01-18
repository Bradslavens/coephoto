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
			<h2 class="tag_text">To get started Register Here.</h2>
			<p>You'll also receive weekly discounts and specials via email.</p>

			<!-- customized form from jquery site -->
			<form action="reg_form" id="registration">

			  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" id="first_name" placeholder="first name">
			  </div>
				
			  <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" id="last_name" placeholder="last name">
			  </div>

				
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" class="form-control" id="email" placeholder="email" required>
			  </div>

				
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" required>
			  </div>


			  <div class="checkbox">
			    <label>
			      <input id="mail_list" type="checkbox"> Email me weekly specials!
			    </label>
			  </div>

			  <div class="checkbox">
			    <label>
			      <input data-toggle="collapse" data-target="#property_dets" aria-expanded="false" aria-controls="property_dets" id="property" type="checkbox"> I need to order a photo shoot now!
			    </label>
			  </div>

			  <div id= "property_dets" class="collapse" > <!-- display if client wants to order a shoot -->

			  <div class="form-group">
			    <label for="Address">Address</label>
			    <input type="address" class="form-control" id="address_1" placeholder="Address">
			  </div>

				
			  <div class="form-group">
			    <label for="city">City</label>
			    <input type="text" class="form-control" id="city" placeholder="City">
			  </div>

				
			  <div class="form-group">
			    <label for="state">State</label>
			    <input type="text" class="form-control" id="state" placeholder="State">
			  </div>

				
			  <div class="form-group">
			    <label for="zip">Zip</label>
			    <input type="text" class="form-control" id="zip" placeholder="Zip">
			  </div>

			  </div> <!-- property_dets -->


 			  <button type="submit" class="btn btn-default">Submit</button>


			</form>

			<!-- the result of the search will be rendered inside this div -->

			<div id="result"></div>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  

			<script>
			// A $( document ).ready() block.

			$('document').ready(function() {

			    console.log( "ready!" );


 
				// Attach a submit handler to the form

				$( "#registration" ).submit(function( event ) {

				  // Stop form from submitting normally

				  event.preventDefault();
				 
				  console.log('submit');

				 

				  // Get some values from elements on the page:

				  var $form = $( this ),

				    first_name = $('#first_name').val(),
				    last_name = $('#last_name').val(),
				    email = $('#email').val(),
				    password = $('#password').val(),
				    address_1 = $('#address_1').val(),
				    city = $('#city').val(),
				    state = $('#state').val(),
				    zip = $('#zip').val(),

				    url = $form.attr( "action" );

				    console.log($('#email').val());

				  // Send the data using post
				  var info = {

				  	first_name : first_name,
				  	last_name : last_name,
				  	email : email,
				  	password : password,
				  	address_1 : address_1,
				  	city : city,
				  	state : state,
				  	zip : zip

				  	};

				  	console.log(info);
				  

				  var posting = $.post( url, info);

				 

				  // Put the results in a div

				  posting.done(function( data ) {

				  	console.log(data);

				    $( "#result" ).empty().append( data );

				  });

				});

			});




			</script>



		</div>
		<div class="col-4-md">
			<img src="/assets/logo_white_no_text.gif">
		</div>
	</div>
</div>
