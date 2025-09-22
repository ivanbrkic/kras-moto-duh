<div class="pt-20 text-center" id="tjedan1">

	<h2 class="mw-650 mx-auto title-c1">Dobitnici prvog tjedna</h2>
	<?php

	$t1 = [
		'Damir Cvijić',
		'Petra Barbarić',
		'Marina Capan',
		'Vedran Drazic',
		'Mia Milat',
	];

	?>
	<div class="swiper js-swiper" style="max-width: 1920px; margin 0 auto;">
		<div class="swiper-wrapper">
			<?php foreach ( $t1 as $key => $value ) : ?>
			<div class="swiper-slide">
				<img src="/wp-content/themes/pg/assets/static/img/<?php echo ( $key + 1 ) ?>.jpg" />
				<span class="title-2"><b><?php echo $value ?></b></span>
			</div>
			<?php endforeach; ?>

		</div>
		<div class="swiper-button-next">
			<img class="" src="/wp-content/themes/pg/assets/static/img/right.svg" />
		</div>
		<div class="swiper-button-prev">
			<img class="" src="/wp-content/themes/pg/assets/static/img/left.svg" />
		</div>
	</div>
</div>
