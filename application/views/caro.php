<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="caro">

<!-- count files for caro -->
<?php  $it = new filesystemiterator(dirname(FCPATH.'/assets/port/'), FilesystemIterator::SKIP_DOTS); $pic_count = (iterator_count($it)/2)+2; ?>

	<div  id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  	<?php
	  		$i = 1 ;
	  		while ( $i <= $pic_count): ?>
	  		<div class="item <?php if ($i==1){ echo 'active';} ?>">
		      <img  src="/assets/port/<?php echo $i; ?>.jpg" alt="real estate photo">
		      <!-- <div class="carousel-caption">
		        ...
		      </div> -->
		    </div>
		    <?php 
		    	$i++; 
	    		endwhile; ?>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>
