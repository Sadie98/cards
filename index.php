<!DOCTYPE html>

<head>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="js/eventsInit.js"></script>

	<link href="css/common.css" rel="stylesheet">
	<link href="css/tariffCard.css" rel="stylesheet">
	<link href="css/planCard.css" rel="stylesheet">
	<link href="css/selectionCard.css" rel="stylesheet">
</head>
<body>
<div id="sknet">
<?
include('generators/getTariffs.php');
include('generators/insertTariffCard.php');
include('generators/insertPlanCard.php');
include('generators/genSelectionCard.php');

// первый экран
echo '<div id="tariffs">';
foreach($tariffs as $tariff){
    insertTariffCard($tariff);
}
echo '</div>';
$selectionCards = '<div id="selection">';

// второй экран
echo '<div id="plans">';
foreach($tariffs as $tariff){
    $maxPrice = 0;
    foreach($tariff->tarifs as $plan){
        if($plan->price / $plan->pay_period > $maxPrice) $maxPrice = $plan->price / $plan->pay_period;
    }

	echo '<div class="plan-'.md5($tariff->title).'">';
    echo '<div class="header back"><span>Тариф "'.$tariff->title.'"</span></div>';
    foreach($tariff->tarifs as $plan){
        insertPlanCard($plan, $maxPrice);
    }
	echo '</div>';
}
echo '</div>';

echo '<div id="selection"></div>';
?>
</div>
</body>
