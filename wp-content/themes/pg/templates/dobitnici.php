<div class="pt-20 text-center" id="tjedan1">

	<h2 class="mw-650 mx-auto title-c1">Dobitnici prvog tjedna</h2>
	<?php

	$win = [
		['Željka Bašić','Željka Bašić.jpg'],
		['Tihana Grugan','Tihana Grugan.jpg'],
		['Marija Škara','Marija Škara.jpg'],
		['Diana Glogivić','Diana Glogivić.jpg'],
		['Lucija Stanko','Lucija Stanko.jpg'],
		['Vesna Kozar','Vesna Kozar.jpg'],
		['Ljubica Muretić','Ljubica Muretić.jpg'],
		['Marko Surać','Marko Surać.jpg'],
		['Andrea Vincetić','Andrea Vincetić.jpg'],
		['Marija Matić Banović','Marija Matić Banović.jpg'],
		['Leo Stojanov','Leo Stojanov.jpg'],
		['Tomislav Palčić','Tomislav Palčić.jpg'],
		['Silvana Mrazović','Silvana Mrazović.jpg'],
		['Tina Sović','Tina Sović.jpg'],
		['Gordana Pavić','Gordana Pavić.jpg'],
		['Ivana Augustinović','Ivana Augustinović.jpg'],
		['Maja Biondić Petričević','Maja Biondić Petričević.jpg'],
		['Claudia Kovacic','Claudia Kovacic.png'],
		['Katarina Varez','Katarina Varez.jpg'],
		['Ozana Brkić','Ozana Brkić.jpeg'],
		['Natalija Barišić','Natalija Barišić.png'],
		['Katarina Petković','Katarina Petković.jpg'],
		['Marina Đanić','Marina Đanić.png'],
		['Ivan Štajduhar','Ivan Štajduhar.jpg'],
		['Rosa Marjanović','Rosa Marjanović.jpg'],
	];


	?>
	<div class="swiper js-swiper" style="max-width: 1920px; margin 0 auto;">
		<div class="swiper-wrapper">
			<?php foreach ( $win as $key => $value ) : ?>
			<div class="swiper-slide">
				<img src="/wp-content/themes/pg/assets/static/img/01/<?php echo ( $value[1] ) ?>" />
				<span class="title-2"><b><?php echo $value[0] ?></b></span>
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
<div class="pt-10 text-center" id="tjedan2">

	<h2 class="mw-650 mx-auto title-c1">Dobitnici drugog tjedna</h2>
	<?php

	$win = [
		['Luka Prpić','Luka Prpić.jpg'],
		['Zrinka Prpić','Zrinka Prpić.jpg'],
		['Tonči Franulić','Tonči Franulić.jpg'],
		['Elvis Kiš','Elvis Kiš.jpg'],
		['Izabela Jakovović','Izabela Jakovović.jpg'],
		['Mirna Maravić','Mirna Maravić.jpg'],
		['Ksenija Majstorović','Ksenija Majstorović.jpg'],
		['Ivan Počakal','Ivan Počakal.jpg'],
		['Željka Posavec','Željka Posavec.jpg'],
		['Karla Kovačić','Karla Kovačić.jpg'],
		['Lovro Mandić','Lovro Mandić.jpg'],
		['Dijana Vesel','Dijana Vesel.jpg'],
		['Slađana Hrvoić','Slađana Hrvoić.jpg'],
		['Doris Bistrički','Doris Bistrički.jpg'],
		['Dunja Gregurec','Dunja Gregurec.jpg'],
		['Samantha Benčić','Samantha Benčić.jpg'],
		['Laura Lovrenčić','Laura Lovrenčić.jpg'],
		['Svjetlana Banović','Svjetlana Banović.jpg'],
		['Dragica Malta','Dragica Malta.jpg'],		
		['Neda Nožinić','Neda Nožinić.jpg'],
		['Marijana Franjić','Marijana Franjić.jpg'],
		['Dubravka Matić','Dubravka Matić.jpg'],
		['Denis Breber','Denis Breber.jpg'],
		['Bruna Kristić','Bruna Kristić.jpg'],
		['Davor Škrbina','Davor Škrbina.jpg'],
	];
	?>
	<div class="swiper js-swiper" style="max-width: 1920px; margin 0 auto;">
		<div class="swiper-wrapper">
			<?php foreach ( $win as $key => $value ) : ?>
			<div class="swiper-slide">
				<img src="/wp-content/themes/pg/assets/static/img/02/<?php echo ( $value[1] ) ?>" />
				<span class="title-2"><b><?php echo $value[0] ?></b></span>
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
