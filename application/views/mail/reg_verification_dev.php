<style type="text/css">

	
	.outer {
		background-color: rgba(75, 163, 207, 1);
		color: white;
		padding: 20px;
	}

	.inner {
		background-color: white;
		color: black;
		padding: 30px;
		margin-top: 20px;
		margin-bottom: 20px;
	}

	img {
		
		display: block;
		margin: 0 auto;
	}

	.outer {

		font-size: 12pt;
	 	font-family: 'Noto Sans', sans-serif;
	
	}

	.address {
		text-align: center;
	}

	button {
		background-color: green;
		color: white;
		font-weight: bold;
		margin: 20px;
		border: none;
		padding: 5px 10px;
	}


</style>

<div class="outer">
		<a href="coefoto.com"><img height="75px" src="/assets/logo_full_color.gif"></a>	
	<div class="inner">
		<p>
		Dear <?php echo $contact['first_name']; ?>,
		</p>
		Thank you for registering on our site. <br> 
		Please click the verify button to verify you're registration. <br> 
		<a href="http://photo.srsample.us/verify/<?php echo $contact['user_id']; ?>"><button>Verify</button></a><br>
		Thanks!
		</p>
	</div>

		<div class="address">
			COEfoto <br>
			Bradley D. Slavens CEO <br>
			Don't pay until you close!<br>
			3399 Ruffin Rd. #2M <br>
			San Diego, CA 92123 <br>
			Ph: 619-253-0529 <br>
		</div>
</div>
