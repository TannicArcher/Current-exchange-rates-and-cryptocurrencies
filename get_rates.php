<?php
// Получение курсов валют и криптовалют с помощью API

// API URL для получения курсов валют
$currencyApiUrl = 'https://api.exchangerate-api.com/v4/latest/USD';

// API URL для получения курсов криптовалют
$cryptoApiUrl = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum&vs_currencies=usd';

// Получение курсов валют
$currencyData = file_get_contents($currencyApiUrl);
$currencyRates = json_decode($currencyData, true)['rates'];

// Получение курсов криптовалют
$cryptoData = file_get_contents($cryptoApiUrl);
$cryptoRates = json_decode($cryptoData, true);

// Соединение всех курсов в один массив
$rates = [
    'usd' => 1,
    'eur' => $currencyRates['EUR'],
    'btc' => $cryptoRates['bitcoin']['usd'],
    'eth' => $cryptoRates['ethereum']['usd']
];

// Возвращение курсов в формате JSON
header('Content-Type: application/json');
echo json_encode($rates);
?>
