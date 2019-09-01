<?

function insertTariffCard($tariff){
	if(stristr($tariff->title, 'Вода')){
		$type = 'water';
	}else{
		$type = stristr($tariff->title, 'Огонь')?'fire':'ground';
	}

	echo "<div class='$type card tariff-".md5($tariff->title)."'>";
	echo '<div class="title">Тариф "'.$tariff->title.'"</div>';

	echo '<div class="details">
			<div class="speed">'.$tariff->speed.' Мбит/c</div>';

	// диапазон цен
	$minPrice = 999999999;
	$maxPrice = 0;
	foreach($tariff->tarifs as $plan){
		$price = $plan->price / $plan->pay_period;

		if($price > $maxPrice) $maxPrice = $price;
		if($price < $minPrice) $minPrice = $price;
	}
	echo '<div class="prices">'.$minPrice.' - '.$maxPrice.' ₽/мес</div>';
	if($tariff->free_options){
		echo '<div class="additional">';
		foreach($tariff->free_options as $freeOption){
			echo '<div>'.$freeOption.'</div>';
		};
		echo '</div>';
	}
	echo '</div>';

	echo '<div class="link">
		<a href="'.$tariff->link.'">Узнать подробнее на сайте www.sknt.ru</a>
		</div>';

	echo '</div>';

	return [];
}