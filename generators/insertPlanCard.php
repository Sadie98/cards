<?

function insertPlanCard($plan, $maxPrice){
	if($plan->pay_period == 1){
		$month = '1 месяц';
	}else{
		$month = ($plan->pay_period == 3)?'3 месяца':$plan->pay_period.' месяцев';
	}
	echo "<div class='$plan->pay_period-month card'>";
	echo '<div class="title">'.$month.'</div>';

	echo '<div class="prices">'.$plan->price / $plan->pay_period.' ₽/мес</div>';

	echo '<div class="additional"><div>разовый платёж - '.$plan->price.' ₽</div>';

	$discount = $maxPrice - $plan->price / $plan->pay_period;
	if($discount) echo '<div>скидка - '.$discount.' ₽</div>';

	echo '</div>';

	echo '</div>';
}