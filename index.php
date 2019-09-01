<!DOCTYPE html>

<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/tariffCard.css" rel="stylesheet">
</head>
<body>
<div id="sknet">
<?
include('generators/getTariffs.php');
include('generators/insertTariffCard.php');
include('generators/insertPlanCard.php');

// первый экран
echo '<div id="tariffs">';
foreach($tariffs as $tariff){
    insertTariffCard($tariff);
}
echo '</div>';

// второй экран
echo '<div id="plans">';
foreach($tariffs as $tariff){
    $maxPrice = 0;
    foreach($tariff->tarifs as $plan){
        if($plan->price / $plan->pay_period > $maxPrice) $maxPrice = $plan->price / $plan->pay_period;
    }

	echo '<div>';
    foreach($tariff->tarifs as $plan){
        insertPlanCard($plan, $maxPrice);
    }
	echo '</div>';
}
echo '</div>';

?>
</div>
</body>
