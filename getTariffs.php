<?

$ch = curl_init('https://www.sknt.ru/job/frontend/data.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = json_decode(curl_exec($ch));

$tariffs = $res->tarifs;