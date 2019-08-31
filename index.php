<!DOCTYPE html>

<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/tariffCard.css" rel="stylesheet">
</head>
<body>
<div id="sknet">
<?
include('getTariffs.php');
include('insertTariffCard.php');

echo '<div id="tariffs">';
foreach($tariffs as $tariff){
		insertTariffCard($tariff);
	}
echo '</div>';
?>
</div>
</body>
