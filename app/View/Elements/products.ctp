<div  id="myslider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		  <div class="item active">
			<?php echo $this->Html->image('/img/slider/1469365091586278slider4.jpg')?>
        </div>

		  <div class="item">
			<?php echo $this->Html->image('/img/slider/best-wordpress-ecommerce-themes.jpg'); ?>
		  </div>

		  <div class="item">
			<?php echo $this->Html->image('/img/slider/sld4.jpg'); ?>
		  </div>

		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
</div>
<br>
<br>
<br>
<div class="row">
    <?php
    $i = 0;
    foreach ($products as $product):
        $i++;
    if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
    ?>
    <div class="col col-sm-3 " style="text-align:center">
			<!-- <div class="col-sm-12" > -->
				<?php echo $this->Html->image('/images/small/' . $product['Product']['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'width' => 150, 'height' => 150, 'class' => 'image')); ?>

			<!-- </div> -->
        <br />
        <?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug'])); ?>
        <br />
        $<?php echo $product['Product']['price']; ?>
        <br />
        <br />
    </div>
    <?php
    if (($i % 4) == 0) { echo "\n</div>\n\n";}
    endforeach;
    ?>

    <br />
    <br />

</div>
