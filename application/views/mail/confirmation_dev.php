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
	<div class="inner">
		<p>
		Dear <?php echo $contact['first_name']; ?>,
		</p>
		<p>
		Thank you for confirming your registration. <br>
		You are all set to order photo shoots. And you won't pay anything unless it closes. <br>
		No credit card required <br>
		Please contact me if you have any questions. <br>
		</p>
		<p>Best Regards!</p>

		<a href="coefoto.com"><img height="75px" src="/assets/logo_full_color.gif"></a>	

		<div class="address">
			COEfoto <br>
			Bradley D. Slavens CEO <br>
			Don't pay until you close!<br>
			3399 Ruffin Rd. #2M <br>
			San Diego, CA 92123 <br>
			Ph: 619-253-0529 <br>
		</div>

	</div>
</div>